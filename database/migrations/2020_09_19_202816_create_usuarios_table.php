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
            $table->string('nome', 200);
            $table->string('senha');
            $table->string('email', 150);
            $table->boolean('administrador')->default('false');
            $table->string('telefone', 20);
            $table->foreignId('endereco_id')->constrained();
            $table->foreignId('perfil_id')->constrained('perfis');
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
