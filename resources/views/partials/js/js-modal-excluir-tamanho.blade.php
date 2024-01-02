<script>
    document.addEventListener('DOMContentLoaded', function() {
        //Excluir tamanho
        var modalExcluirTamanho = document.getElementById('modalExcluirTamanho');
        var cancelBtnTamanhoExcluir = document.getElementById('cancelBtnTamanhoExcluir');
        var excluirTamanhoForm = document.getElementById('excluirTamanhoForm');
        var tamanhoIdInput = document.getElementById('tamanhoIdInput');

        function showModalExcluirTamanho() {
            modalExcluirTamanho.classList.remove('hidden');
        }

        function hideModalExcluirTamanho() {
            modalExcluirTamanho.classList.add('hidden');
        }

        var excluirTamanhoLinks = document.getElementsByClassName('excluir-tamanho');
        for (var i = 0; i < excluirTamanhoLinks.length; i++) {
            excluirTamanhoLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalExcluirTamanho();

                // Captura o ID do tamanho
                var tamanhoId = this.getAttribute('data-tamanho-id');

                // Define o ID do tamanho no input hidden do formulário
                tamanhoIdInput.value = tamanhoId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnTamanhoExcluir.addEventListener('click', function() {
            hideModalExcluirTamanho();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnTamanhoExcluir').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto do tamanho
            var tamanhoId = tamanhoIdInput.value;
            excluirTamanhoForm.action = `/tamanho-destroy/${tamanhoId}`;

            // Submete o formulário ao clicar no botão "Sim"
            excluirTamanhoForm.submit();
        });
    });
</script>
