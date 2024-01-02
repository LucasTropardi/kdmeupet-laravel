<!-- Excluir adocao interesse -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalExcluirInteresse">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Deseja excluir o registro?</p>
        <div class="flex justify-end">
            <form action="{{ route('adocao.interesse.delete', 0) }}" method="post" id="excluirInteresseForm">
                @csrf
                @method('DELETE')
                <input type="hidden" id="interesseIdInput" name="interesse_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnInteresseExcluir">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded" id="confirmBtnInteresseExcluir">Sim</button>
            </form>
        </div>
    </div>
</div>
