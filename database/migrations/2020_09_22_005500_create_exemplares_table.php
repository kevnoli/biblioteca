<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExemplaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exemplares', function (Blueprint $table) {
            $table->bigIncrements('tombo');
            $table->unsignedTinyInteger('numero');
            $table->unsignedDecimal('valor_aquisicao', 6, 2);
            $table->boolean('consulta')->default(false);
            $table->foreignId('material_id')->constrained('materiais');
            $table->string('usuario_cpf', 11);
            $table->foreign('usuario_cpf')->references('cpf')->on('usuarios');
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
        Schema::dropIfExists('exemplares');
    }
}
