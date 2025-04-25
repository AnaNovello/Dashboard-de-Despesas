<!-- Modal -->
<div id="ganhoModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Novo Ganho</h2>
        <form id="form-ganho" data-url="{{ route('ganho.salvar') }}">
            @csrf
            <input type="hidden" name="conta_debito_id" id="input-conta-id">

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Nome</label>
                <input type="text" name="nome" required class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Observação</label>
                <textarea name="observacao" rows="2" class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Valor</label>
                <input type="number" name="valor" step="0.01" required class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Data</label>
                <input type="date" name="data" required class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Hora</label>
                <input type="time" name="hora" required class="w-full mt-1 p-2 rounded border dark:bg-gray-700 dark:text-white">
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" onclick="toggleGanhoModal()" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Salvar</button>
            </div>
        </form>
    </div>
</div>