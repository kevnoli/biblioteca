<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensEmprestimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_emprestimo', function (Blueprint $table) {
            $table->foreignId('emprestimo_id')->constrained();
            $table->unsignedBigInteger('exemplar_tombo');
            $table->foreign('exemplar_tombo')->references('tombo')->on('exemplares');
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
        Schema::dropIfExists('itens_emprestimo');
    }
}
