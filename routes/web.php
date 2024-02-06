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

Route::prefix('categorias')->controller(\App\Http\Controllers\CategoriaController::class)->group(function () {
    Route::get('/listar', 'index')->name('categoria.listar');
    Route::post('/salvar', 'create')->name('categoria.salvar');
    Route::put('/editar/{id_categoria}', 'edit')->name('categoria.atualizar');
    Route::delete('/deletar/{id_categoria}', 'delete')->name('categoria.deletar');
});

Route::prefix('produtos')->controller(\App\Http\Controllers\ProdutoController::class)->group(function () {
    Route::get('/listar', 'index')->name('produto.listar');
    Route::post('/salvar', 'create')->name('produto.salvar');
    Route::put('/editar/{id_produto}', 'edit')->name('produto.atualizar');
    Route::delete('/deletar/{id_produto}', 'delete')->name('produto.deletar');
});


Route::prefix('movimentacoes')->controller(\App\Http\Controllers\MovimentacaoController::class)->group(function () {
    Route::get('/listar', 'index');
    Route::post('/salvar/{id_produto}', 'create')->name('movimentacao.produto.salvar');
    Route::put('/editar/{id_movimentacao}', 'edit');
    Route::delete('/deletar/{id_movimentacao}', 'delete');
    Route::get('/buscar/{id_movimentacao}', 'show');
});


