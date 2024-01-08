<!-- Confirma finalização modal -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <div title="Publicação finalizada" class="grid justify-items-center p-1">
            <div>
                <img src="{{ asset('images/warning-icon.png') }}" alt="Logo" width="70">
            </div>
        </div>
        <p class="mb-8 mt-4 font-medium text-gray-700 text-xl">Deseja realmente finalizar a publicação?</p>
        <div class="flex justify-center">
            <form action="{{ route('finalizar.publicacao', 0) }}" method="post" id="confirmForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="animalIdInput" name="animal_id" value="">
                <button type="button" class="font-medium text-lg px-4 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg mr-2" id="cancelBtn">Cancelar</button>
                <button type="button" class="font-medim text-lg text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg inline-flex items-center px-5 py-2.5 text-center" id="confirmBtn">Finalizar</button>
            </form>
        </div>
    </div>
</div>
