<?php

namespace App\Http\Controllers;

use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }


    public function index()
    {
        return $this->produtoService->index();
    }


    public function create(Request $request)
    {
        return $this->produtoService->create($request);

    }

    public function show(int $id_produto)
    {
        return $this->produtoService->show($id_produto);

    }

    public function edit(Request $request, int $id_produto)
    {
        return $this->produtoService->edit($request, $id_produto);
    }


    public function delete(int $id_produto)
    {
        return $this->produtoService->delete($id_produto);

    }
}
