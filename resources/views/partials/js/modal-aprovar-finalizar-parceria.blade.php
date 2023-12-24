<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalAprovarParceria = document.getElementById('modalAprovarParceria');
        var cancelBtnParceriaAprovar = document.getElementById('cancelBtnParceriaAprovar');
        var aproveForm = document.getElementById('aproveForm');
        var parceriaIdInput = document.getElementById('parceriaIdInput');

        function showModalAprovarParceria() {
            modalAprovarParceria.classList.remove('hidden');
        }

        function hideModalAprovarParceria() {
            modalAprovarParceria.classList.add('hidden');
        }

        var aprovarLinks = document.getElementsByClassName('aprovar-parceria');
        for (var i = 0; i < aprovarLinks.length; i++) {
            aprovarLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalAprovarParceria();

                // Captura o ID da parceria
                var parceriaId = this.getAttribute('data-parceria-id');

                // Define o ID da parceria no input hidden do formulário
                parceriaIdInput.value = parceriaId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnParceriaAprovar.addEventListener('click', function() {
            hideModalAprovarParceria();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnParceriaAprovar').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto da parceria
            var parceriaId = parceriaIdInput.value;
            aproveForm.action = `/aprovar-parceria/${parceriaId}`;

            // Submete o formulário ao clicar no botão "Sim"
            aproveForm.submit();
        });

        //Finalizar Parceria
        var modalFinalizarParceria = document.getElementById('modalFinalizarParceria');
        var cancelBtnParceriaFinalizar = document.getElementById('cancelBtnParceriaFinalizar');
        var finalizarForm = document.getElementById('finalizarForm');
        var parceriaIdInput = document.getElementById('parceriaIdInput');

        function showModalFinalizarParceria() {
            modalFinalizarParceria.classList.remove('hidden');
        }

        function hideModalFinalizarParceria() {
            modalFinalizarParceria.classList.add('hidden');
        }

        var finalizarLinks = document.getElementsByClassName('finalizar-parceria');
        for (var i = 0; i < finalizarLinks.length; i++) {
            finalizarLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalFinalizarParceria();

                // Captura o ID da parceria
                var parceriaId = this.getAttribute('data-parceria-id');

                // Define o ID da parceria no input hidden do formulário
                parceriaIdInput.value = parceriaId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnParceriaFinalizar.addEventListener('click', function() {
            hideModalFinalizarParceria();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnParceriaFinalizar').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto da parceria
            var parceriaId = parceriaIdInput.value;
            finalizarForm.action = `/finalizar-parceria/${parceriaId}`;

            // Submete o formulário ao clicar no botão "Sim"
            finalizarForm.submit();
        });

        //Excluir Parceria
        var modalExcluirParceria = document.getElementById('modalExcluirParceria');
        var cancelBtnParceriaExcluir = document.getElementById('cancelBtnParceriaExcluir');
        var excluirParceriaForm = document.getElementById('excluirParceriaForm');
        var parceriaIdInput = document.getElementById('parceriaIdInput');

        function showModalExcluirParceria() {
            modalExcluirParceria.classList.remove('hidden');
        }

        function hideModalExcluirParceria() {
            modalExcluirParceria.classList.add('hidden');
        }

        var excluirParceriaLinks = document.getElementsByClassName('excluir-parceria');
        for (var i = 0; i < excluirParceriaLinks.length; i++) {
            excluirParceriaLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalExcluirParceria();

                // Captura o ID da parceria
                var parceriaId = this.getAttribute('data-parceria-id');

                // Define o ID da parceria no input hidden do formulário
                parceriaIdInput.value = parceriaId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnParceriaExcluir.addEventListener('click', function() {
            hideModalExcluirParceria();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnParceriaExcluir').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto da parceria
            var parceriaId = parceriaIdInput.value;
            excluirParceriaForm.action = `/excluir-parceria/${parceriaId}`;

            // Submete o formulário ao clicar no botão "Sim"
            excluirParceriaForm.submit();
        });
    });
</script>
