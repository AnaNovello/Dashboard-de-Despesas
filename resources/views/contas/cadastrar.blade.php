<x-app-layout>
    <div class="w-full max-w-2xl mx-auto py-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cadastrar Conta') }}
            </h2>
        </x-slot>

        <form method="POST" action="{{ route('conta.debito.salvar') }}" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 space-y-6">
            @csrf            
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-semibold mb-2">Dê um apelido para sua conta:</label>
                <input type="text" id="nome" name="nome" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline">
                    {{ 'Cadastrar' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>