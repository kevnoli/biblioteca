<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 250);
            $table->string('local', 150);
            $table->year('ano_publicacao');
            $table->string('local_publicacao', 150);
            $table->unsignedTinyInteger('tipo');
            $table->string('administrador_cpf', 11);
            $table->foreign('administrador_cpf')->references('cpf')->on('administradores');
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
        Schema::dropIfExists('materiais');
    }
}
