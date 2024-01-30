<?php

namespace App\Services;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoService
{

    public function index()
    {
        $produtos = Produto::query()->get()->all();

        return response()->json(['produtos' => $produtos]);
    }


    public function create(Request $request)
    {
        $produto = Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade_em_estoque' => $request->quantidade_em_estoque,
            'id_categoria' => $request->id_categoria
        ]);

        return response()->json(['produto' => $produto, 'message' => 'Produto adicionado com sucesso!']);
    }

    public function show(int $id_produto)
    {
        $produto = Produto::query()->find($id_produto);

        return response()->json(['produto' => $produto]);
    }

    public function edit(Request $request, int $id_produto)
    {
        $produto = Produto::query()->find($id_produto)->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade_em_estoque' => $request->quantidade_em_estoque,
            'id_categoria' => $request->id_categoria
        ]);

        return response()->json(['produto' => $produto, 'message' => 'Produto atualizado com sucesso!']);
    }


    public function delete(int $id_produto)
    {
        Produto::query()->find($id_produto)->delete();

        return response()->json(['message' => 'Produto removido com sucesso!']);
    }

}
