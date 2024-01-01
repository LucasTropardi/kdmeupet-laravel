<?php

use App\Http\Controllers\AdocaoController;
use App\Http\Controllers\AdocaoInteresseController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalGerenciadorController;
use App\Http\Controllers\AuthenticatedRoutesController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\ParceriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicRoutesController;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\SituacaoController;
use App\Http\Controllers\TamanhoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/

// Rotas Públicas
Route::get('home', [PublicRoutesController::class, 'home'])
    ->name('home');

Route::get('/', [PublicRoutesController::class, 'home']);

Route::get('achados', [PublicRoutesController::class, 'achados'])
    ->name('achados');

Route::get('perdidos', [PublicRoutesController::class, 'perdidos'])
    ->name('perdidos');

Route::get('localizacoes', [PublicRoutesController::class, 'localizacoes'])
    ->name('localizacoes');

Route::get('parcerias', [PublicRoutesController::class, 'parcerias'])
    ->name('parcerias');

Route::get('adocoes', [PublicRoutesController::class, 'adocoes'])
    ->name('adocoes');

Route::get('ver-animal/{id}', [PublicRoutesController::class, 'ver_animal'])
    ->name('ver.animal');

// Rotas com autenticação Gerenciadores
Route::middleware(['auth', 'verified', 'can:level'])->group(function () {
    // Rotas para users
    Route::get('users-index', [UserController::class, 'index'])->name('user.index');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user-update/{id}', [UserController::class, 'update'])->name('user.update');

    // Resources
    Route::resources([
        'cor'                => CorController::class,
        'raca'               => RacaController::class,
        'especie'            => EspecieController::class,
        'tamanho'            => TamanhoController::class,
        'situacao'           => SituacaoController::class,
        'animal-gerenciador' => AnimalGerenciadorController::class,
    ]);
    Route::get('confirma-delete-cor/{id}', [CorController::class, 'confirma_delete_cor'])
        ->name('confirma.delete.cor');

    // Rotas para espécies
    Route::get('confirma-delete-especie/{id}', [EspecieController::class, 'confirma_delete_especie'])
        ->name('confirma.delete.especie');

    // Rotas para raças
    Route::get('confirma-dedlete-raca/{id}', [RacaController::class, 'confirma_delete_raca'])
        ->name('confirma.delete.raca');

    // Rotas para tamanhos
    Route::get('confirma-delete-tamanho/{id}', [TamanhoController::class, 'confirma_delete_tamanho'])
        ->name('confirma.delete.tamanho');

    // Rotas para situações
    Route::get('confirma-delete-situacao/{id}', [SituacaoController::class, 'confirma_delete_situacao'])
        ->name('confirma.delete.situacao');

    // Rotas para animais gerenciador
    Route::get('confirma-delete-animal/{id}', [AnimalGerenciadorController::class, 'confirma_delete_animal'])
        ->name('confirma.delete.animal');
    Route::delete('animal-gerenciador.destroy/{animal}', [AnimalGerenciadorController::class, 'destroy'])
        ->name('animal-gerenciador.destroy');
    Route::put('reativar-publicacao/{id}', [AnimalGerenciadorController::class, 'atualizar'])
        ->name('reativar.publicacao');

    // Parcerias Gerenciador
    Route::get('parceria-gerenciador', [ParceriaController::class, 'gerenciador_index'])
        ->name('parceria.gerenciador');
    Route::put('aprovar-parceria/{id}', [ParceriaController::class, 'aprovar_parceria'])
        ->name('aprovar.parceria');
    Route::delete('excluir-parceria/{id}', [ParceriaController::class, 'destroy'])
        ->name('excluir.parceria');

    // Adoção Gerenciador
    Route::get('adocao-gerenciador', [AdocaoController::class, 'index_gerenciador'])
        ->name('adocao.gerenciador');
    Route::delete('excluir-adocao/{id}', [AdocaoController::class, 'destroy'])
        ->name('excluir.adocao');
});

// Rotas de usuários
Route::middleware(['auth', 'verified',])->group(function () {
    Route::get('dashboard', [AuthenticatedRoutesController::class, 'dashboard'])
        ->name('dashboard');

    // Resources
    Route::resources([
        'animal'   => AnimalController::class,
        'parceria' => ParceriaController::class,
        'adocao'   => AdocaoController::class,
    ]);

    // salvar mensagem
    Route::post('salvar-mensagem', [AnimalController::class, 'salvar_mensagem'])
        ->name('salvar.mensagem');

    // atualizar mensagem
    Route::put('atualizar-mensagem/{id}', [AnimalController::class, 'atualizar_mensagem'])
        ->name('atualizar.mensagem');

    // apagar mensagem
    Route::delete('apagar-mensagem/{mensagem}', [AnimalController::class, 'apagar_mensagem'])
        ->name('apagar.mensagem');

    // Achados
    Route::get('logado-achados', [AuthenticatedRoutesController::class, 'achados'])
        ->name('logado.achados');

    // Perdidos
    Route::get('logado-perdidos', [AuthenticatedRoutesController::class, 'perdidos'])
        ->name('logado.perdidos');

    // Rotas para parcerias
    Route::get('parceria-ver/{parceria}', [ParceriaController::class, 'show'])
        ->name('parceria.ver');
    Route::get('parceria-editar/{parceria}', [ParceriaController::class, 'edit'])
        ->name('parceria.editar');
    Route::put('parceria-atualizar/{parceria}', [ParceriaController::class, 'update'])
        ->name('parceria.atualizar');
    Route::put('finalizar-parceria/{id}', [ParceriaController::class, 'finalizar_parceria'])
        ->name('finalizar.parceria');

    // Rotas para adoções
    Route::get('finalizar-adocao/{adocao}', [AdocaoController::class, 'finalizar_adocao'])
        ->name('adocao.finalizar');
    Route::put('adocao-stop/{adocao}', [AdocaoController::class, 'finalizar'])
        ->name('adocao.stop');
    Route::post('salvar-mensagem-adocao', [AdocaoController::class, 'salvar_mensagem'])
        ->name('salvar.mensagem.adocao');
    Route::put('atualizar-mensagem-adocao/{id}', [AdocaoController::class, 'atualizar_mensagem'])
        ->name('atualizar.mensagem.adocao');
    Route::delete('apagar-mensagem-adocao/{mensagem}', [AdocaoController::class, 'apagar_mensagem'])
        ->name('apagar.mensagem.adocao');
    Route::get('adocao-interesse-create/{id}', [AdocaoInteresseController::class, 'create'])
        ->name('adocao.interesse.create');
    Route::post('adocao.interesse.store', [AdocaoInteresseController::class, 'store'])
        ->name('adocao.interesse.store');
    Route::get('lista-adocoes', [AdocaoController::class, 'lista_adocoes'])
        ->name('lista.adocoes');
    Route::get('adocao-interesse-index/{id}', [AdocaoInteresseController::class, 'index'])
        ->name('adocao.interesse.index');
    Route::get('adocao-interesse-show/{interesse}', [AdocaoInteresseController::class, 'show'])
        ->name('adocao.interesse.show');
    Route::get('adocao-interesse-edit/{interesse}', [AdocaoInteresseController::class, 'edit'])
        ->name('adocao.interesse.edit');
    Route::put('adocao-interesse-update/{interesse}', [AdocaoInteresseController::class, 'update'])
        ->name('adocao.interesse.update');
    Route::get('adocao-interesse-finalizar/{interesse}', [AdocaoInteresseController::class, 'finalizar_interesse'])
        ->name('adocao.interesse.finalizar');
    Route::put('adocao-interesse-finalizar-confirm/{interesse}', [AdocaoInteresseController::class, 'finalizar'])
        ->name('interesse.finalizar');
});

// Rotas auxiliares para cadastro animal
Route::get('/buscar-racas', [AnimalController::class, 'buscarRacas']);
Route::get('/buscar-tamanhos', [AnimalController::class, 'buscarTamanhos']);
Route::put('finalizar-publicacao/{id}', [AnimalController::class, 'atualizar'])
    ->name('finalizar.publicacao');

// Rotas logadas de usuários, vem do breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
