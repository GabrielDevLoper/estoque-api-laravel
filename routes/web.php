<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/index", [\App\Http\Controllers\RouteController::class, 'index'])->name('dashboard');
Route::get("/", [\App\Http\Controllers\RouteController::class, 'login'])->name('login');

Route::prefix('tipos_movimentacao')->controller(\App\Http\Controllers\TipoMovimentacaoController::class)->group(function () {
    Route::get('/listar', 'index')->name('tipo.movimentacao.listar');
    Route::post('/salvar', 'create')->name('tipo.movimentacao.salvar');
    Route::put('/editar/{id_tipo_movimentacao}', 'update')->name('tipo.movimentacao.atualizar');
    Route::delete('/deletar/{id_tipo_movimentacao}', 'delete')->name('tipo.movimentacao.deletar');
});


