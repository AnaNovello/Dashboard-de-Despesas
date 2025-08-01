<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard_gastos.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gastos de {{ $conta->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">
                    {{ $conta->nome }}
                </h3>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Lista de Gastos</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-left text-sm uppercase">
                                <tr>
                                    <th class="px-6 py-3">Nome</th>
                                    <th class="px-6 py-3">Data</th>
                                    <th class="px-6 py-3">Hora</th>
                                    <th class="px-6 py-3">Valor</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800 dark:text-gray-100 text-sm">
                                @forelse ($gastos as $gasto)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $gasto->nome }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($gasto->data)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4">{{ $gasto->hora }}</td>
                                        <td class="px-6 py-4 font-semibold text-red-600">- R$ {{ number_format($gasto->valor, 2, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Nenhum gasto registrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">
                    Dashboard de {{ $conta->nome }}
                </h3>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Distribuição de Gastos por Categorias</h3>
                    <h1 class="text-sm font-semibold mb-4 text-gray-900 dark:text-gray-100">
                        (Categorias Limitadas a 10. Caso queira o gráfico completo, <a href="#" id="baixarGrafico" class="underline text-blue-500 hover:text-blue-700">baixe aqui</a>.)</h1>
                    <Label class="text-gray-900 dark:text-gray-100">Tipo de Gráfico: </Label>
                    <select id="graficoTipo" class="border rounded px-2 py-1 text-sm dark:bg-gray-700 dark:text-gray-100">
                        <option value="bar" selected>Barras</option>
                        <option value="line">Linha</option>
                        <option value="doughnut">Rosca</option>
                    </select>
                    <div class="max-w-3xl ">
                        <canvas 
                            id="graficoGastos" 
                            width="600"
                            height="300"
                            data-labels='@json($dadosGrafico->keys())'
                            data-valores='@json($dadosGrafico->values())'>
                        </canvas>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
