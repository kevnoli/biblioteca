<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaisAutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais_autores', function (Blueprint $table) {
            $table->foreignId('autor_id')->constrained('autores');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiais');
            //$table->unsignedTinyInteger('ordem');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros_autores');
    }
}
