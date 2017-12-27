<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatilloCartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlatilloCarta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->string('descripcion', 255)->nullable();
            $table->decimal('precio',5,3);
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
        Schema::dropIfExists('PlatilloCarta');
    }
}
