<!-- Confirma reativação modal -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalReativar">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Tem certeza que deseja reativar a publicação?</p>
        <div class="flex justify-end">
            <form action="{{ route('reativar.publicacao', 0) }}" method="post" id="confirmFormReativar">
                @csrf
                @method('PUT')
                <input type="hidden" id="animalIdInputReativar" name="animal_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnReativar">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-green-500 text-white hover:bg-blue-600 rounded" id="confirmBtnReativar">Sim</button>
            </form>
        </div>
    </div>
</div>
