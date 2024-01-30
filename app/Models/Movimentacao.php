<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes';

    protected $fillable = ['id_produto', 'id_tipo_movimentacao', 'quantidade'];

    public function produto(){
        return $this->hasOne(Produto::class, 'id', 'id_produto');
    }

    public function tipoMovimentacao(){
        return $this->hasOne(TipoMovimentacao::class, 'id', 'id_tipo_movimentacao');
    }
}
