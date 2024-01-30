<?php

namespace Database\Seeders;

use App\Models\TipoMovimentacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoMovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tiposMovimentacao = TipoMovimentacao::query()->get()->count() <= 0;

        if($tiposMovimentacao){
            TipoMovimentacao::create(['nome' => 'ENTRADA']);
            TipoMovimentacao::create(['nome' => 'SAIDA']);
        }
    }
}
