<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenMeritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_meritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region');
            $table->string('nivel', 1);
            $table->string('apellido', 50);
            $table->string('nombre', 50);
            $table->integer('cuil');
            $table->string('sexo', 1);
            $table->string('localidad', 50);
            $table->string('cargo', 100);
            $table->string('titulo_1', 100);
            $table->string('titulo_2', 100);
            $table->string('incumbencia');
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
        Schema::dropIfExists('orden_meritos');
    }
}
