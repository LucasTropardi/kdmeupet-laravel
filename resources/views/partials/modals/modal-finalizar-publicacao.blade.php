<!-- Confirma finalização modal -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Tem certeza que deseja finalizar a publicação?</p>
        <div class="flex justify-end">
            <form action="{{ route('finalizar.publicacao', 0) }}" method="post" id="confirmForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="animalIdInput" name="animal_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtn">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded" id="confirmBtn">Sim</button>
            </form>
        </div>
    </div>
</div>
