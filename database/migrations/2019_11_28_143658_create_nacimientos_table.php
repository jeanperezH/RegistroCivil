<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNacimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('libro')->unsigned();
            $table->bigInteger('folio')->unsigned();
            $table->bigInteger('n_partida')->unsigned();
            $table->date('fecha_r');
            $table->date('fecha_n');
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('anexo');
            $table->string('acta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nacimientos');
    }
}
