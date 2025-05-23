<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Extrato da Conta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">
                    {{ $conta->nome }}
                </h3>

                <h3 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    Saldo atual:  R$ {{ number_format($conta->saldo_calculado, 2, ',', '.') }}
                </h3>

                <div class="flex gap-4 mb-6">    
                    <a href="{{ route('gastos.conta', ['conta' => $conta->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Gerenciar Gastos
                    </a>
                    <a href="{{ route('ganhos.conta', ['conta' => $conta->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded">
                        Gerenciar Ganhos
                    </a>
                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Extrato da Conta</h3>
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
                                @forelse ($extrato as $item)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $item->nome }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4">{{ $item->hora }}</td>
                                        <td class="px-6 py-4 font-semibold 
                                            {{ $item->tipo === 'ganho' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $item->tipo === 'ganho' ? '+ ' : '- ' }}R$ {{ number_format($item->valor, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Nenhum ganho ou gasto encontrado.
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
</x-app-layout>