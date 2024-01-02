// Objeto para armazenar os estados de exibição das divs de edição
var estadosEdicao = {};

// Função para mostrar ou ocultar a div de edição
function mostrarEdicao(element, mensagemId) {
    var divEdicao = document.getElementById('edicao-' + mensagemId);
    if (divEdicao) {
        if (estadosEdicao[mensagemId]) {
            divEdicao.classList.add('hidden');
        } else {
            divEdicao.classList.remove('hidden');
        }
        estadosEdicao[mensagemId] = !estadosEdicao[mensagemId];
    }
}

// Objeto para armazenar os estados de exibição das divs de edição
var estadosDelete = {};

// Função para mostrar ou ocultar a div de edição
function mostrarDelete(element, mensagemId) {
    var divDelete = document.getElementById('delete-' + mensagemId);
    if (divDelete) {
        if (estadosDelete[mensagemId]) {
            divDelete.classList.add('hidden');
        } else {
            divDelete.classList.remove('hidden');
        }
        estadosDelete[mensagemId] = !estadosDelete[mensagemId];
    }
}

// Função para cancelar a exclusão
function cancelarDelete(mensagemId) {
    var divDelete = document.getElementById('delete-' + mensagemId);
    if (divDelete) {
        divDelete.classList.add('hidden');
    }
}
