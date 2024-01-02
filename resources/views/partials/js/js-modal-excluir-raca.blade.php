<script>
    document.addEventListener('DOMContentLoaded', function() {
        //Excluir raça
        var modalExcluirRaca = document.getElementById('modalExcluirRaca');
        var cancelBtnRacaExcluir = document.getElementById('cancelBtnRacaExcluir');
        var excluirRacaForm = document.getElementById('excluirRacaForm');
        var racaIdInput = document.getElementById('racaIdInput');

        function showModalExcluirRaca() {
            modalExcluirRaca.classList.remove('hidden');
        }

        function hideModalExcluirRaca() {
            modalExcluirRaca.classList.add('hidden');
        }

        var excluirRacaLinks = document.getElementsByClassName('excluir-raca');
        for (var i = 0; i < excluirRacaLinks.length; i++) {
            excluirRacaLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalExcluirRaca();

                // Captura o ID da raça
                var racaId = this.getAttribute('data-raca-id');

                // Define o ID da raça no input hidden do formulário
                racaIdInput.value = racaId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnRacaExcluir.addEventListener('click', function() {
            hideModalExcluirRaca();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnRacaExcluir').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto da raça
            var racaId = racaIdInput.value;
            excluirRacaForm.action = `/raca-destroy/${racaId}`;

            // Submete o formulário ao clicar no botão "Sim"
            excluirRacaForm.submit();
        });
    });
</script>
