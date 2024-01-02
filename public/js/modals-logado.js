// Confirmações modal
document.addEventListener('DOMContentLoaded', function() {
    // finalizar publicação
    var modal = document.getElementById('modal');
    var cancelBtn = document.getElementById('cancelBtn');
    var confirmBtn = document.getElementById('confirmBtn');
    var confirmForm = document.getElementById('confirmForm');
    var animalIdInput = document.getElementById('animalIdInput');

    function showModal() {
        modal.classList.remove('hidden');
    }

    function hideModal() {
        modal.classList.add('hidden');
    }

    var finalizarLinks = document.getElementsByClassName('finalizar-publicacao');
    for (var i = 0; i < finalizarLinks.length; i++) {
        finalizarLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            showModal();

            // Captura o ID do animal
            var animalId = this.getAttribute('data-animal-id');

            // Define o ID do animal no input hidden do formulário
            animalIdInput.value = animalId;
        });
    }

    // Adiciona evento de clique no botão "Cancelar" do modal
    cancelBtn.addEventListener('click', function() {
        hideModal();
    });

    // Evento de clique no botão "Sim" (Confirmar)
    confirmBtn.addEventListener('click', function() {
        // Define a ação do formulário com o ID correto do animal
        var animalId = animalIdInput.value;
        confirmForm.action = `/finalizar-publicacao/${animalId}`;

        // Submete o formulário ao clicar no botão "Sim"
        confirmForm.submit();
    });

    // Evento para fechar o modal ao clicar fora da área do modal
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            hideModal();
        }
    });

    // retivar publicação
    var modalReativar = document.getElementById('modalReativar');
    var cancelBtnReativar = document.getElementById('cancelBtnReativar');
    var confirmBtnReativar = document.getElementById('confirmBtnReativar');
    var confirmFormReativar = document.getElementById('confirmFormReativar');
    var animalIdInputReativar = document.getElementById('animalIdInputReativar');

    function showModalReativar() {
        modalReativar.classList.remove('hidden');
    }

    function hideModalReativar() {
        modalReativar.classList.add('hidden');
    }

    var reativarLinks = document.getElementsByClassName('reativar-publicacao');
    for (var i = 0; i < reativarLinks.length; i++) {
        reativarLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            showModalReativar();

            // Captura o ID do animal para reativar
            var animalId = this.getAttribute('data-animal-id');

            // Define o ID do animal no input hidden do formulário de reativação
            animalIdInputReativar.value = animalId;
        });
    }

    cancelBtnReativar.addEventListener('click', function() {
        hideModalReativar();
    });

    confirmBtnReativar.addEventListener('click', function() {
        var animalIdReativar = animalIdInputReativar.value;
        // Define ação para reativar a publicação
        confirmFormReativar.action = `/reativar-publicacao/${animalIdReativar}`;
        // Submete o formulário para reativar a publicação
        confirmFormReativar.submit();
    });

    // excluir animal
    var modalExcluirAnimal = document.getElementById('modalExcluirAnimal');
    var cancelBtnExcluirAnimal = document.getElementById('cancelBtnExcluirAnimal');
    var confirmBtnExcluirAnimal = document.getElementById('confirmBtnExcluirAnimal');
    var confirmFormExcluirAnimal = document.getElementById('confirmFormExcluirAnimal');
    var animalIdInputExcluir = document.getElementById('animalIdInputExcluir');

    function showModalExcluirAnimal() {
        modalExcluirAnimal.classList.remove('hidden');
    }

    function hideModalExcluirAnimal() {
        modalExcluirAnimal.classList.add('hidden');
    }

    var excluirAnimalLinks = document.getElementsByClassName('excluir-animal');
    for (var i = 0; i < excluirAnimalLinks.length; i++) {
        excluirAnimalLinks[i].addEventListener('click', function(e) {
            e.preventDefault();
            showModalExcluirAnimal();

            // Captura o ID do animal para excluir
            var animalId = this.getAttribute('data-animal-id');

            // Define o ID do animal no input hidden do formulário de exclusao
            animalIdInputExcluir.value = animalId;
        });
    }

    cancelBtnExcluirAnimal.addEventListener('click', function() {
        hideModalExcluirAnimal();
    });

    confirmBtnExcluirAnimal.addEventListener('click', function() {
        var animalIdExcluir = animalIdInputExcluir.value;
        // Define ação para reativar a publicação
        confirmFormExcluirAnimal.action = `/animal-gerenciador.destroy/${animalIdExcluir}`;
        // Submete o formulário para reativar a publicação
        confirmFormExcluirAnimal.submit();
    });
});
