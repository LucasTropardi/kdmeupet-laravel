<!-- Excluir raça -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalExcluirRaca">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Deseja excluir esta raça?</p>
        <div class="flex justify-end">
            <form action="{{ route('raca.destroy', 0) }}" method="post" id="excluirRacaForm">
                @csrf
                @method('DELETE')
                <input type="hidden" id="racaIdInput" name="raca_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnRacaExcluir">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-red-500 text-white hover:bg-red-700 rounded" id="confirmBtnRacaExcluir">Sim</button>
            </form>
        </div>
    </div>
</div>
