<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PainelDeControleController;
use App\Http\Controllers\ContaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/PainelDeControle', [PainelDeControleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('PainelDeControle');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/conta/cadastrar', [ContaController::class, 'cadastrar'])->name('conta.cadastrar');
    Route::get('/conta/editar', [ContaController::class, 'editar'])->name('conta.editar');
    Route::get('/conta/excluir', [ContaController::class, 'excluir'])->name('conta.excluir');
});



require __DIR__.'/auth.php';
