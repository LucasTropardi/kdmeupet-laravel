<?php

use App\Http\Controllers\CorController;
use App\Http\Controllers\EspecieController;
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

Route::middleware(['auth', 'verified', 'can:level'])->group(function () {
    // Rotas com autenticação Gerenciadores
    Route::get('users-index', [UserController::class, 'index'])->name('user.index');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user-update/{id}', [UserController::class, 'update'])->name('user.update');

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
});

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
