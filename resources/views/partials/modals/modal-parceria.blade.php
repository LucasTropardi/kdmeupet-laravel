<!-- Aprovar parceria -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalAprovarParceria">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Deseja aprovar a parceria?</p>
        <div class="flex justify-end">
            <form action="{{ route('aprovar.parceria', 0) }}" method="post" id="aproveForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="parceriaIdInput" name="parceria_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnParceriaAprovar">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded" id="confirmBtnParceriaAprovar">Sim</button>
            </form>
        </div>
    </div>
</div>

<!-- Finalizar parceria -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalFinalizarParceria">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Deseja finalizar a parceria?</p>
        <div class="flex justify-end">
            <form action="{{ route('finalizar.parceria', 0) }}" method="post" id="finalizarForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="parceriaIdInput" name="parceria_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnParceriaFinalizar">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded" id="confirmBtnParceriaFinalizar">Sim</button>
            </form>
        </div>
    </div>
</div>

<!-- Excluir parceria -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden" id="modalExcluirParceria">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <p class="mb-4">Deseja excluir a parceria?</p>
        <div class="flex justify-end">
            <form action="{{ route('excluir.parceria', 0) }}" method="post" id="excluirParceriaForm">
                @csrf
                @method('DELETE')
                <input type="hidden" id="parceriaIdInput" name="parceria_id" value="">
                <button type="button" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded mr-2" id="cancelBtnParceriaExcluir">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded" id="confirmBtnParceriaExcluir">Sim</button>
            </form>
        </div>
    </div>
</div>
