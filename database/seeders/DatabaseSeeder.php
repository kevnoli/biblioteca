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
        $a = '';
        for ($i = 0; $i<11; $i++) 
        {
            $a .= mt_rand(0,9);
        }
        DB::table('administradores')->insert([
            'cpf' => $a,
            'nome' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'senha' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}