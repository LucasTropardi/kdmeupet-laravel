<script>
    document.addEventListener('DOMContentLoaded', function() {
        //Excluir situação
        var modalExcluirSituacao = document.getElementById('modalExcluirSituacao');
        var cancelBtnSituacaoExcluir = document.getElementById('cancelBtnSituacaoExcluir');
        var excluirSituacaoForm = document.getElementById('excluirSituacaoForm');
        var situacaoIdInput = document.getElementById('situacaoIdInput');

        function showModalExcluirSituacao() {
            modalExcluirSituacao.classList.remove('hidden');
        }

        function hideModalExcluirSituacao() {
            modalExcluirSituacao.classList.add('hidden');
        }

        var excluirSituacaoLinks = document.getElementsByClassName('excluir-situacao');
        for (var i = 0; i < excluirSituacaoLinks.length; i++) {
            excluirSituacaoLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalExcluirSituacao();

                // Captura o ID da situação
                var situacaoId = this.getAttribute('data-situacao-id');

                // Define o ID da situacao no input hidden do formulário
                situacaoIdInput.value = situacaoId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnSituacaoExcluir.addEventListener('click', function() {
            hideModalExcluirSituacao();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnSituacaoExcluir').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto da situação
            var situacaoId = situacaoIdInput.value;
            excluirSituacaoForm.action = `/situacao-destroy/${situacaoId}`;

            // Submete o formulário ao clicar no botão "Sim"
            excluirSituacaoForm.submit();
        });
    });
</script>
