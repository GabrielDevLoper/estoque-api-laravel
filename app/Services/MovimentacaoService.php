<?php

namespace App\Services;

use App\Models\Movimentacao;
use App\Models\Produto;
use App\Models\TipoMovimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class MovimentacaoService
{

    public function index()
    {
        $movimentacoes = Movimentacao::query()->with(['produto', 'tipoMovimentacao'])->get()->all();

        return response()->json($movimentacoes);
    }

    public function create(Request $request, int $id_produto)
    {
        if($this->verificaQuantidadeProdutoEmEstoque($id_produto, $request->id_tipo_movimentacao, $request->quantidade)){
            return response()->json(['message' => 'quantidade do produto menor que a quantidade da saida'], 400);
        }

        $movimentacao = Movimentacao::create([
            'id_produto' => $id_produto,
            'id_tipo_movimentacao' => $request->id_tipo_movimentacao,
            'quantidade' => $request->quantidade,
        ]);

        $this->movimentandoQuantidadeProduto($movimentacao->id_produto, $movimentacao->id_tipo_movimentacao, $movimentacao->quantidade);

        return redirect()->route('produto.listar');
    }

    public function show(int $id_movimentacao)
    {
        $movimentacao = Movimentacao::query()->find($id_movimentacao);

        return response()->json($movimentacao);
    }

    public function edit(Request $request, int $id_movimentacao)
    {
        $movimentacao = Produto::query()->find($id_movimentacao)->update([
            'id_produto' => $request->id_produto,
            'id_tipo_movimentacao' => $request->id_tipo_movimentacao,
            'quantidade' => $request->quantidade,
        ]);

        return response()->json($movimentacao);
    }

    public function delete(int $id_movimentacao)
    {
        Produto::query()->find($id_movimentacao)->delete();

        return response()->json(['message' => 'Produto removido com sucesso!']);
    }

    public function movimentandoQuantidadeProduto(int $id_produto, int $id_tipo_movimentacao, int $quantidade)
    {
        $produto = Produto::find($id_produto);
        $tipo_movimentacao = TipoMovimentacao::find($id_tipo_movimentacao);

        if ($tipo_movimentacao->id == 1) {
            $produto->update([
                'quantidade_em_estoque' => $produto->quantidade_em_estoque + $quantidade
            ]);
        } elseif ($tipo_movimentacao->id == 2) {
            $produto->update([
                'quantidade_em_estoque' => $produto->quantidade_em_estoque - $quantidade
            ]);
        }
    }


    public function verificaQuantidadeProdutoEmEstoque(int $id_produto, int $id_tipo_movimentacao, int $quantidade)
    {
        $produto = Produto::find($id_produto);

        if ($id_tipo_movimentacao == 2 && $produto->quantidade_em_estoque < $quantidade) {
           return true;
        }

        return false;
    }

}
