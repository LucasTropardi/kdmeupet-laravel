<script>
    document.addEventListener('DOMContentLoaded', function() {
        //Excluir Cor
        var modalExcluirCor = document.getElementById('modalExcluirCor');
        var cancelBtnCorExcluir = document.getElementById('cancelBtnCorExcluir');
        var excluirCorForm = document.getElementById('excluirCorForm');
        var corIdInput = document.getElementById('corIdInput');

        function showModalExcluirCor() {
            modalExcluirCor.classList.remove('hidden');
        }

        function hideModalExcluirCor() {
            modalExcluirCor.classList.add('hidden');
        }

        var excluirCorLinks = document.getElementsByClassName('excluir-cor');
        for (var i = 0; i < excluirCorLinks.length; i++) {
            excluirCorLinks[i].addEventListener('click', function(e) {
                e.preventDefault();
                showModalExcluirCor();

                // Captura o ID da cor
                var corId = this.getAttribute('data-cor-id');

                // Define o ID da cor no input hidden do formulário
                corIdInput.value = corId;
            });
        }

        // Adiciona evento de clique no botão "Cancelar" do modal
        cancelBtnCorExcluir.addEventListener('click', function() {
            hideModalExcluirCor();
        });

        // Evento de clique no botão "Sim" (Confirmar)
        document.getElementById('confirmBtnCorExcluir').addEventListener('click', function() {
            // Define a ação do formulário com o ID correto da cor
            var corId = corIdInput.value;
            excluirCorForm.action = `/cor-destroy/${corId}`;

            // Submete o formulário ao clicar no botão "Sim"
            excluirCorForm.submit();
        });
    });
</script>
