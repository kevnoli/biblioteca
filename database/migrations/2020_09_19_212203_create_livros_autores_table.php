<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosAutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros_autores', function (Blueprint $table) {
            $table->foreignId('autor_id')->constrained('autores');
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id')->references('material_id')->on('livros');
            $table->unsignedTinyInteger('ordem');
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
