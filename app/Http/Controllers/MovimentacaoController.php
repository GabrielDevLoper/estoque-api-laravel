<?php

namespace App\Http\Controllers;

use App\Services\MovimentacaoService;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    private $movimentacaoService;

    public function __construct(MovimentacaoService $movimentacaoService)
    {
        $this->movimentacaoService = $movimentacaoService;
    }

}