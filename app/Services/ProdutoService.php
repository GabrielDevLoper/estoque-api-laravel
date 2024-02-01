<?php

namespace App\Services;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoService
{
    public function index()
    {
        $produtos = Produto::query()->with('categoria')->get()->all();

        return response()->json($produtos);
    }

    public function create(Request $request)
    {
        $produto = Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade_em_estoque' => $request->quantidade_em_estoque,
            'id_categoria' => $request->id_categoria
        ]);

        return response()->json($produto);
    }

    public function show(int $id_produto)
    {
        $produto = Produto::query()->find($id_produto);

        return response()->json( $produto);
    }

    public function edit(Request $request, int $id_produto)
    {
        $produto = Produto::query()->find($id_produto)->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade_em_estoque' => $request->quantidade_em_estoque,
            'id_categoria' => $request->id_categoria
        ]);

        return response()->json($produto);
    }


    public function delete(int $id_produto)
    {
        Produto::query()->find($id_produto)->delete();

        return response()->json(['message' => 'Produto removido com sucesso!']);
    }

}
