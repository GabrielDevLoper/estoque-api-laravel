<?php

namespace App\Services;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaService
{
    public function index()
    {
        $categorias = Categoria::query()->get()->all();

        return response()->json($categorias);
    }

    public function create(Request $request)
    {
        $categoria = Categoria::create([
            'nome' => $request->nome,
        ]);

        return response()->json($categoria);
    }

    public function show(int $id_categoria)
    {
        $categoria = Categoria::query()->find($id_categoria);

        return response()->json($categoria);
    }

    public function edit(Request $request, int $id_categoria)
    {
        $categoria = Categoria::query()->find($id_categoria)->update([
            'nome' => $request->nome,
        ]);

        return response()->json($categoria);
    }


    public function delete(int $id_categoria)
    {
        Categoria::query()->find($id_categoria)->delete();

        return response()->json(['message' => 'Categoria removida com sucesso!']);
    }

}
