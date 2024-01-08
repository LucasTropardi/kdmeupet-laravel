document.addEventListener('DOMContentLoaded', function() {
    //Excluir usuario
    var modalExcluirUsuario = document.getElementById('modalExcluirUsuario');
    var cancelBtnUsuarioExcluir = document.getElementById('cancelBtnUsuarioExcluir');
    var excluirUsuarioForm = document.getElementById('excluirUsuarioForm');
    var usuarioIdInput = document.getElementById('usuarioIdInput');

    function showModalExcluirUsuario() {
        modalExcluirUsuario.classList.remove('hidden');
    }

    function hideModalExcluirUsuario() {
        modalExcluirUsuario.classList.add('hidden');
    }

    var excluirUsuarioLinks = document.getElementsByClassName('excluir-usuario');
    for (var i = 0; i < excluirUsuarioLinks.length; i++) {
        excluirUsuarioLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            showModalExcluirUsuario();

            // Captura o ID do usuario
            var usuarioId = this.getAttribute('data-usuario-id');

            // Define o ID do usuario no input hidden do formulário
            usuarioIdInput.value = usuarioId;
        });
    }

    // Adiciona evento de clique no botão "Cancelar" do modal
    cancelBtnUsuarioExcluir.addEventListener('click', function() {
        hideModalExcluirUsuario();
    });

    // Evento de clique no botão "Sim" (Confirmar)
    document.getElementById('confirmBtnUsuarioExcluir').addEventListener('click', function() {
        // Define a ação do formulário com o ID correto do usuario
        var usuarioId = usuarioIdInput.value;
        excluirUsuarioForm.action = `/destroy-profile/${usuarioId}`;

        // Submete o formulário ao clicar no botão "Sim"
        excluirUsuarioForm.submit();
    });
});
