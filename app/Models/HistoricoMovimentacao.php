<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMovimentacao extends Model
{
    use HasFactory;

    protected $table = 'historico_movimentacoes';

    protected $fillable = ['id_usuario', 'id_movimentacao'];

}
