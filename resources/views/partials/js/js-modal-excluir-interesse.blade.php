<script>
    document.addEventListener('DOMContentLoaded', function() {
        //Excluir Interesse
        var modalExcluirInteresse = document.getElementById('modalExcluirInteresse');
        var cancelBtnInteresseExcluir = document.getElementById('cancelBtnInteresseExcluir');
        var excluirInteresseForm = document.getElementById('excluirInteresseForm');
        var interesseIdInput = document.getElementById('interesseIdInput');

        function showModalExcluirInteresse() {
            modalExcluirInteresse.classList.remove('hidden');
        }

        function hideModalExcluirInteresse() {
            modalExcluirInteresse.classList.add('hidden');
        }

        var excluirInteresseLinks = document.getElementsByClassName('excluir-interesse');
        for (var i = 0; i < excluirInteresseLinks.length; i++) {
            excluirInteresseLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalExcluirInteresse();

                // Captura o ID do interesse
                var interesseId = this.getAttribute('data-interesse-id');

                // Define o ID do interesse no input hidden do formulário
                interesseIdInput.value = interesseId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnInteresseExcluir.addEventListener('click', function() {
            hideModalExcluirInteresse();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnInteresseExcluir').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto do interesse
            var interesseId = interesseIdInput.value;
            excluirInteresseForm.action = `/adocao-interesse-delete/${interesseId}`;

            // Submete o formulário ao clicar no botão "Sim"
            excluirInteresseForm.submit();
        });
    });
</script>
