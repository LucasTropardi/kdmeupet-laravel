import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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


