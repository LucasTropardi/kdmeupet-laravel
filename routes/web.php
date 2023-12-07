<?php

use App\Http\Controllers\CorController;
use App\Http\Controllers\ProfileController;
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

Route::get('user-alterar/{id}', [UserController::class, 'alterar'])
    ->name('user.alterar');

// Rotas para Cores
Route::resources([
    'cor' => CorController::class,
]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
