document.addEventListener('DOMContentLoaded', function() {
    //Excluir Adoção
    var modalExcluirAdocao = document.getElementById('modalExcluirAdocao');
    var cancelBtnAdocaoExcluir = document.getElementById('cancelBtnAdocaoExcluir');
    var excluirAdocaoForm = document.getElementById('excluirAdocaoForm');
    var adocaoIdInput = document.getElementById('adocaoIdInput');

    function showModalExcluirAdocao() {
        modalExcluirAdocao.classList.remove('hidden');
    }

    function hideModalExcluirAdocao() {
        modalExcluirAdocao.classList.add('hidden');
    }

    var excluirAdocaoLinks = document.getElementsByClassName('excluir-adocao');
    for (var i = 0; i < excluirAdocaoLinks.length; i++) {
        excluirAdocaoLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            showModalExcluirAdocao();

            // Captura o ID da adoção
            var adocaoId = this.getAttribute('data-adocao-id');

            // Define o ID da adoção no input hidden do formulário
            adocaoIdInput.value = adocaoId;
        });
    }

    // Adiciona evento de clique no botão "Cancelar" do modal
    cancelBtnAdocaoExcluir.addEventListener('click', function() {
        hideModalExcluirAdocao();
    });

    // Evento de clique no botão "Sim" (Confirmar)
    document.getElementById('confirmBtnAdocaoExcluir').addEventListener('click', function() {
        // Define a ação do formulário com o ID correto da adoção
        var adocaoId = adocaoIdInput.value;
        excluirAdocaoForm.action = `/excluir-adocao/${adocaoId}`;

        // Submete o formulário ao clicar no botão "Sim"
        excluirAdocaoForm.submit();
    });
});
