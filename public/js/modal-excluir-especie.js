document.addEventListener('DOMContentLoaded', function() {
    //Excluir Espécie
    var modalExcluirEspecie = document.getElementById('modalExcluirEspecie');
    var cancelBtnEspecieExcluir = document.getElementById('cancelBtnEspecieExcluir');
    var excluirEspecieForm = document.getElementById('excluirEspecieForm');
    var especieIdInput = document.getElementById('especieIdInput');

    function showModalExcluirEspecie() {
        modalExcluirEspecie.classList.remove('hidden');
    }

    function hideModalExcluirEspecie() {
        modalExcluirEspecie.classList.add('hidden');
    }

    var excluirEspecieLinks = document.getElementsByClassName('excluir-especie');
    for (var i = 0; i < excluirEspecieLinks.length; i++) {
        excluirEspecieLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            showModalExcluirEspecie();

            // Captura o ID da espécie
            var especieId = this.getAttribute('data-especie-id');

            // Define o ID da espécie no input hidden do formulário
            especieIdInput.value = especieId;
        });
    }

    // Adiciona evento de clique no botão "Cancelar" do modal
    cancelBtnEspecieExcluir.addEventListener('click', function() {
        hideModalExcluirEspecie();
    });

    // Evento de clique no botão "Sim" (Confirmar)
    document.getElementById('confirmBtnEspecieExcluir').addEventListener('click', function() {
        // Define a ação do formulário com o ID correto da espécie
        var especieId = especieIdInput.value;
        excluirEspecieForm.action = `/especie-destroy/${especieId}`;

        // Submete o formulário ao clicar no botão "Sim"
        excluirEspecieForm.submit();
    });
});
