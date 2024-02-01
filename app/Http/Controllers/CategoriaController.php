<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }


    public function index()
    {
        return $this->categoriaService->index();
    }

    public function create(Request $request)
    {
        return $this->categoriaService->create($request);

    }

    public function show(int $id_categoria)
    {
        return $this->categoriaService->show($id_categoria);

    }

    public function edit(Request $request, int $id_categoria)
    {
        return $this->categoriaService->edit($request, $id_categoria);

    }


    public function delete(int $id_categoria)
    {
        return $this->categoriaService->delete($id_categoria);

    }
}
