<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('cpf', 11)->primary();
            $table->primary('cpf');
            $table->string('telefone', 20);
            $table->string('senha', 64);
            $table->string('email', 150);
            $table->foreignId('endereco_id')->constrained();
            $table->foreignId('perfil_id')->constrained('perfis');
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
        Schema::dropIfExists('usuarios');
    }
}
