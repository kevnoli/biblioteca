<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeders.
    *
    * @return void
    */
    public function run()
    {
        DB::table('perfis')->insert([
            'max_livro' => 3,
            'tempo_emprestimo' => 15,
            'tempo_renovacao' => 15,
            'descricao' => 'Funcionário',
            'max_reserva' => 3
        ]);

        DB::table('enderecos')->insert([
            'logradouro' => 'Rua A',
            'bairro' => 'Boa Vista',
            'numero' => '10',
            'cep' => '45026000',
            'cidade' => 'Vitória da Conquista',
            'uf' => 'BA'
        ]);

        $cpf = '';
        for ($i = 0; $i<11; $i++) 
        {
            $cpf .= mt_rand(0,9);
        }
        DB::table('usuarios')->insert([
            'cpf' => $cpf,
            'nome' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'senha' => Hash::make('123456'),
            'administrador' => true,
            'telefone' => '77999999999',
            'endereco_id' => 1,
            'perfil_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}