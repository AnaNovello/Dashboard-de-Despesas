<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PainelDeControleController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\ContasDebitoController;
use App\Http\Controllers\ContasCreditoController;
use App\Http\Controllers\GanhosController;
use App\Http\Controllers\GastosDebitoController;
use App\Http\Controllers\GastosCreditoController;

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

Route::post('/conta/cadastrar', [ContasDebitoController::class, 'salvar'])->name('conta.debito.salvar');
Route::get('/conta/{id}/extrato', [ContasDebitoController::class, 'extrato'])->name('conta.debito.extrato');
//Route::get('/conta/{id}/extrato/ganhos', [ContasDebitoController::class, 'ganhosAjax'])->name('conta.debito.ganhos.ajax');
//Route::get('/conta/{id}/extrato/gastos', [ContasDebitoController::class, 'gastosAjax'])->name('conta.debito.gastos.ajax');

Route::get('/conta/{conta}/gastos', [GastosDebitoController::class, 'listarPorConta'])->name('gastos.conta');
Route::get('/conta/{conta}/ganhos', [GanhosController::class, 'listarPorConta'])->name('ganhos.conta');



require __DIR__.'/auth.php';
