<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('max_livro');
            $table->unsignedTinyInteger('tempo_emprestimo');
            $table->unsignedTinyInteger('tempo_renovacao');
            $table->string('descricao', 150);
            $table->unsignedTinyInteger('max_reserva');
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
        Schema::dropIfExists('perfis');
    }
}
