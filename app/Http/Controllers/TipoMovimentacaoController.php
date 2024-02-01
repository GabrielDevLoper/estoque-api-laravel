<?php

namespace App\Http\Controllers;

use App\Services\ProdutoService;
use App\Services\TipoMovimentacaoService;
use Illuminate\Http\Request;

class TipoMovimentacaoController extends Controller
{
    private $tipoMovimentacaoService;

    public function __construct(TipoMovimentacaoService $tipoMovimentacaoService)
    {
        $this->tipoMovimentacaoService = $tipoMovimentacaoService;
    }

    public function index()
    {
        return $this->tipoMovimentacaoService->index();
    }

    public function create(Request $request)
    {
        return $this->tipoMovimentacaoService->create($request);
    }

    public function update(Request $request, int $id_tipo_movimentacao)
    {
        return $this->tipoMovimentacaoService->update($request, $id_tipo_movimentacao);
    }

    public function delete(int $id_tipo_movimentacao)
    {
        return $this->tipoMovimentacaoService->delete($id_tipo_movimentacao);
    }

}
