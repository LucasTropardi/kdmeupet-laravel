<?php

use App\Http\Controllers\CorController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\SituacaoController;
use App\Http\Controllers\TamanhoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/

// Rotas Públicas
Route::view('home', 'public.home')->name('home');

Route::get('/', function () {
    return view('public.home');
});

Route::view('achados', 'public.achados')
    ->name('achados');

Route::view('perdidos', 'public.perdidos')
    ->name('perdidos');

Route::view('localizacoes', 'public.localizacoes')
    ->name('localizacoes');

Route::view('parcerias', 'public.parcerias')
    ->name('parcerias');

Route::view('adocoes', 'public.adocoes')
    ->name('adocoes');

// Rotas com autenticação
// Gerenciadores
Route::get('users-index', [UserController::class, 'index'])
    ->name('user.index');

Route::get('user-edit/{id}', [UserController::class, 'edit'])
    ->name('user.edit');

Route::put('user-update/{id}', [UserController::class, 'update'])
    ->name('user.update');


// Rotas para Cores
Route::resources([
    'cor' => CorController::class,
]);

Route::get('confirma-delete-cor/{id}', [CorController::class, 'confirma_delete_cor'])
    ->name('confirma.delete.cor');

// Rotas para espécies
Route::resources([
    'especie' => EspecieController::class,
]);

Route::get('confirma-delete-especie/{id}', [EspecieController::class, 'confirma_delete_especie'])
    ->name('confirma.delete.especie');

// Rotas para raças
Route::resources([
    'raca' => RacaController::class,
]);

Route::get('confirma-dedlete-raca/{id}', [RacaController::class, 'confirma_delete_raca'])
    ->name('confirma.delete.raca');

// Rotas para tamanhos
Route::resources([
    'tamanho' => TamanhoController::class,
]);

Route::get('confirma-delete-tamanho/{id}', [TamanhoController::class, 'confirma_delete_tamanho'])
    ->name('confirma.delete.tamanho');

// Rotas para situações
Route::resources([
    'situacao' => SituacaoController::class,
]);

Route::get('confirma-delete-situacao/{id}', [SituacaoController::class, 'confirma_delete_situacao'])
    ->name('confirma.delete.situacao');

// Dashboard do usuário
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
