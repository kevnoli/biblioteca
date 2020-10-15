<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->foreignId('material_id')->constrained('materiais');
            $table->primary('material_id');
            $table->string('isbn', 20)->unique();
            $table->unsignedTinyInteger('edicao');
            $table->unsignedSmallInteger('qtd_paginas');
            $table->string('classificacao', 16);
            $table->foreignId('editora_id')->constrained();
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
        Schema::dropIfExists('livros');
    }
}
