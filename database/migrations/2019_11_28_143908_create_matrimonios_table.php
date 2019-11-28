<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrimonios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('libro')->unsigned();
            $table->bigInteger('folio')->unsigned();
            $table->bigInteger('n_partida')->unsigned();
            $table->date('fecha');
            $table->string('apellidos_v');
            $table->string('nombres_v');
            $table->string('apellidos_m');
            $table->string('nombres_m');
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
        Schema::dropIfExists('matrimonios');
    }
}
