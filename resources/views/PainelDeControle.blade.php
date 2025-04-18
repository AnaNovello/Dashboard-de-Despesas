<link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_admin_painelDeControle.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto de perfil" class="w-20 h-20 rounded-md object-cover">
                        @else
                            <img src="{{ asset('storage/profile_pictures/none.png') }}" alt="Foto de Perfil" class="w-20 h-20 rounded-md object-cover">
                        
                        @endif
                    </div>

                    <h2 class="text-2xl font-bold mb-4">{{ $user->name }}</h2>

                    <div class="mb-4">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-4">
                        <strong>Membro desde:</strong> {{ $user->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
            <div class="p-4 text-gray-900 dark:text-gray-100">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Gerenciar Contas</h3>
            </div>
            <div class="p-8 text-gray-900 dark:text-gray-100">        
                    <div class="flex justify-center flex-col sm:flex-row gap-16">
                        <a href="{{ route('conta.cadastrar') }}" class="bg-green-600 hover:bg-green-700 text-white-800 font-semibold py-12 px-12 rounded-md shadow-md transition duration-200">
                            Cadastrar nova conta
                        </a>
                        <a href="{{ route('conta.editar') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white-800 font-semibold py-12 px-12 rounded-md shadow-md transition duration-200">
                            Editar conta existente
                        </a>
                        <a href="{{ route('conta.excluir') }}" class="bg-red-600 hover:bg-red-700 text-white-800 font-semibold py-12 px-12 rounded-md shadow-md transition duration-200">
                            Excluir conta existente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
            <div class="p-4 text-gray-900 dark:text-gray-100">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Contas Cadastradas</h3>
            </div>
            <div class="p-4 flex justify-left flex-col sm:flex-row gap-16">               
                @if ($contasDebito->isEmpty())
                    <p class="text-white-600 dark:text-white-400">Você ainda não cadastrou nenhuma conta.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold text-gray-600 dark:text-gray-200 uppercase">
                                    <th class="py-3 px-4">Nome da Conta</th>
                                    <th class="py-3 px-4">Data de Criação</th>
                                    <th class="py-3 px-4">Saldo</th>
                                    <th class="py-3 px-4">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-100">
                                @foreach ($user->contasDebito as $conta)
                                    <tr class="border-t border-gray-200 dark:border-gray-700">
                                        <td class="py-3 px-4">{{ $conta->nome }}</td>
                                        <td class="py-3 px-4">{{ $conta->created_at->format('d/m/Y') }}</td>
                                        <td class="py-3 px-4">R$ {{ number_format($conta->saldo_calculado, 2, ',', '.') }}</td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('conta.debito.extrato', $conta->id) }}" class="text-blue-600 hover:underline">Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>




<!-- Espaço extra na mesma cor de fundo (cinza) -->
<div class="h-16 dark:bg-gray-900"></div>
</x-app-layout>
    