<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 45);
            $table->string('apellidos', 45);
            $table->string('dni', 10);
            $table->date('fecha_nacimiento');
            $table->string('telefono',13);
            $table->string('direccion', 140);
            $table->integer('tipo')->unsigned();
            $table->foreign('tipo')->references('id')->on('TipoEmpleado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Empleado');
    }
}
