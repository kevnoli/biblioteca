<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->string('usuario_cpf', 11);
            $table->foreign('usuario_cpf')->references('cpf')->on('usuarios');
            $table->string('usuario_administrador_cpf', 11);
            $table->foreign('usuario_administrador_cpf')->references('cpf')->on('usuarios');
            $table->timestamp('data_emprestimo');
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
        Schema::dropIfExists('emprestimos');
    }
}
