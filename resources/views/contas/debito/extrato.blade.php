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
                    Extrato da conta: {{ $conta->nome }}
                </h3>
                
                <p class="text-gray-700 dark:text-gray-300">
                    Saldo atual: R$ {{ number_format($conta->saldo_calculado, 2, ',', '.') }}
                </p>

                <p class="mt-4 text-gray-700 dark:text-gray-300">
                    Aqui você pode exibir os ganhos, gastos, e outras movimentações associadas a esta conta.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
