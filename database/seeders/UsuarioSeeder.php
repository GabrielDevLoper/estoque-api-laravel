<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::create([
            'name' => 'Gabriel',
            'email' => 'gabriel.devloper@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
