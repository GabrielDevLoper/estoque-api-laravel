<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\MovimentacaoController;

use App\Http\Controllers\CategoriaController;


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
    Route::put('/editar/{id_produto}', 'edit');
    Route::delete('/deletar/{id_produto}', 'delete');
    Route::get('/buscar/{id_produto}', 'show');
});


Route::prefix('movimentacoes')->controller(MovimentacaoController::class)->group(function () {
    Route::get('/listar', 'index');
    Route::post('/salvar', 'create');
    Route::put('/editar/{id_produto}', 'edit');
    Route::delete('/deletar/{id_produto}', 'delete');
    Route::get('/buscar/{id_produto}', 'show');
});
