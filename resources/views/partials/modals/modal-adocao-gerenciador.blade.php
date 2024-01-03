<!-- Excluir adocao -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalExcluirAdocao">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Deseja excluir o animal para adoção?</p>
        <div class="flex justify-end">
            <form action="{{ route('adocao.destroy', 0) }}" method="post" id="excluirAdocaoForm">
                @csrf
                @method('DELETE')
                <input type="hidden" id="adocaoIdInput" name="adocao_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnAdocaoExcluir">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-red-500 text-white hover:bg-red-700 rounded" id="confirmBtnAdocaoExcluir">Sim</button>
            </form>
        </div>
    </div>
</div>
