<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $primaryKey = 'id';

    protected $fillable = ['nome', 'preco', 'quantidade_em_estoque', 'id_categoria'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }
}
