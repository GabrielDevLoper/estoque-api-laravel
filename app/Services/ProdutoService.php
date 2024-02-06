<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\TipoMovimentacao;
use Illuminate\Http\Request;

class ProdutoService
{
    public function index()
    {
        $produtos = Produto::query()->with('categoria')->get()->all();
        $categorias = Categoria::all();
        $tiposMovimentacao = TipoMovimentacao::all();

        return view('estoque.produto.listar', compact('produtos', 'categorias', 'tiposMovimentacao'));
    }

    public function create(Request $request)
    {
        Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade_em_estoque' => $request->quantidade_em_estoque,
            'id_categoria' => $request->id_categoria
        ]);

        return redirect()->route('produto.listar');
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

        return redirect()->route('produto.listar');
    }


    public function delete(int $id_produto)
    {
        Produto::query()->find($id_produto)->delete();

        return redirect()->route('produto.listar');
    }

}
