<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoMovimentacaoController;


Route::prefix('produtos')->controller(ProdutoController::class)->group(function () {
    Route::get('/listar', 'index');
    Route::post('/salvar', 'create');
    Route::put('/editar/{id_produto}', 'edit');
    Route::delete('/deletar/{id_produto}', 'delete');
    Route::get('/buscar/{id_produto}', 'show');
});

Route::prefix('categorias')->controller(CategoriaController::class)->group(function () {
    Route::get('/listar', 'index');
    Route::post('/salvar', 'create');
    Route::put('/editar/{id_categoria}', 'edit');
    Route::delete('/deletar/{id_categoria}', 'delete');
    Route::get('/buscar/{id_categoria}', 'show');
});

Route::prefix('movimentacoes')->controller(MovimentacaoController::class)->group(function () {
    Route::get('/listar', 'index');
    Route::post('/salvar', 'create');
    Route::put('/editar/{id_movimentacao}', 'edit');
    Route::delete('/deletar/{id_movimentacao}', 'delete');
    Route::get('/buscar/{id_movimentacao}', 'show');
});

Route::prefix('tipos_movimentacao')->controller(TipoMovimentacaoController::class)->group(function () {
    Route::get('/listar', 'index');
    Route::post('/salvar', 'create');
    Route::delete('/deletar/{id_tipo_movimentacao}', 'delete');

});
