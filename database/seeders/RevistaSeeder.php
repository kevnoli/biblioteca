<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use APp\Models\Revista;

class RevistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Revista::factory()->count(15)->create();
    }
}
