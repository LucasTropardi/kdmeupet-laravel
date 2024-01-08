<!-- Excluir cor -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalExcluirCor">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <svg class="mx-auto mb-4 text-gray-700 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
        <p class="mb-8 font-medium text-gray-700 text-xl">Deseja realmente excluir esta cor?</p>
        <div class="flex justify-center">
            <form action="{{ route('cor.destroy', 0) }}" method="post" id="excluirCorForm">
                @csrf
                @method('DELETE')
                <input type="hidden" id="corIdInput" name="cor_id" value="">
                <button type="button" class="font-medium text-lg px-4 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg mr-2" id="cancelBtnCorExcluir">Cancelar</button>
                <button type="button" class="font-medim text-lg text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg inline-flex items-center px-5 py-2.5 text-center" id="confirmBtnCorExcluir">Excluir</button>
            </form>
        </div>
    </div>
</div>
