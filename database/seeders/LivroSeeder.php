<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Livro;
use App\Models\Autor;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Livro::factory()->count(80)->create();
    }
}
