import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// // Mapa de cadastro animal
// document.addEventListener('DOMContentLoaded', function () {
//     var southWest = L.latLng(-21.465, -50.15);
//     var northEast = L.latLng(-21.385, -49.99);
//     var bounds = L.latLngBounds(southWest, northEast);

//     var map = L.map('map', {
//         maxBounds: bounds,
//         maxZoom: 18,
//         minZoom: 12
//     }).setView([-21.41908221945518, -50.07632303277206], 13);

//     var marker = null;

//     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         maxZoom: 19,
//         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//     }).addTo(map);

//     map.on('click', function (e) {
//         var lat = e.latlng.lat;
//         var lng = e.latlng.lng;

//         document.getElementById('latitude').value = lat;
//         document.getElementById('longitude').value = lng;

//         if (marker) {
//             marker.setLatLng([lat, lng]);
//         } else {
//             marker = L.marker([lat, lng]).addTo(map);
//         }
//     });
// });

// navbar
var navbar = document.querySelector('.fixed-nav');
    var navLinks = document.querySelectorAll('.nav-link');
    var threshold = 100;

    window.addEventListener('scroll', function() {
        if (window.scrollY > threshold) {
            navbar.style.backgroundColor = '#ccc';
            navLinks.forEach(function(link) {
                link.style.color = 'blue';
            });
        } else {
            navbar.style.backgroundColor = '#f3f4f6';
            navLinks.forEach(function(link) {
                link.style.color = 'white';
            });
        }
    });

// Máscara para data
$(document).ready(function() {
    // Máscara para a data (formato: dd/mm/aaaa)
    $('#anData').inputmask('99/99/9999');

    // Inicialização do Datepicker
    $('#anData').datepicker({
        format: 'dd/mm/yyyy',
        autoHide: true,
    });
});

// Selecionar raças e tamanhos para cadastro animal
function atualizarOpcoesRacaETamanho() {
    var especieId = $('#especie_id').val();

    $.ajax({
        url: '/buscar-racas',
        method: 'GET',
        data: { especie_id: especieId },
        success: function (response) {
            var racaSelect = $('#raca_id');
            racaSelect.empty();

            if (response.racas && response.racas.length > 0) {
                $.each(response.racas, function (index, raca) {
                    racaSelect.append('<option value="' + raca.id + '">' + raca.racaNome + '</option>');
                });
            } else {
                racaSelect.append('<option value="">Nenhuma raça encontrada</option>');
            }
        },
        error: function (error) {
            console.log('Erro na requisição de raças:', error);
        }
    });

    $.ajax({
        url: '/buscar-tamanhos',
        method: 'GET',
        data: { especie_id: especieId },
        success: function (response) {
            var tamanhoSelect = $('#tamanho_id');
            tamanhoSelect.empty();

            if (response.tamanhos && response.tamanhos.length > 0) {
                $.each(response.tamanhos, function (index, tamanho) {
                    tamanhoSelect.append('<option value="' + tamanho.id + '">' + tamanho.tamanho + '</option>');
                });
            } else {
                tamanhoSelect.append('<option value="">Nenhum tamanho encontrado</option>');
            }
        },
        error: function (error) {
            console.log('Erro na requisição de tamanhos:', error);
        }
    });
}

$('#especie_id').change(function () {
    atualizarOpcoesRacaETamanho();
});

atualizarOpcoesRacaETamanho();

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


