<?php

namespace App\Services;

use App\Models\TipoMovimentacao;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TipoMovimentacaoService
{

    public function index()
    {
        $tipos_movimentacao = TipoMovimentacao::query()->get()->all();

        return view('estoque.tipoMovimentacao.listar', compact('tipos_movimentacao'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required'
        ], [
            'nome.required' => 'Nome é obrigatório'
        ]);


        if ($validator->fails()) {
            throw new ValidationException($validator, response()->json(['error' => $validator->errors()], 422));
        }

         TipoMovimentacao::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('tipo.movimentacao.listar');
    }

    public function update(Request $request, int $id_tipo_movimentacao)
    {
        TipoMovimentacao::query()->find($id_tipo_movimentacao)->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('tipo.movimentacao.listar');
    }

    public function delete(int $id_tipo_movimentacao)
    {
        TipoMovimentacao::query()->find($id_tipo_movimentacao)->delete();

        return redirect()->route('tipo.movimentacao.listar');
    }


}
