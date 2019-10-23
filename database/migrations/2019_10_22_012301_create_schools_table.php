<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            // columnas
            $table->increments('id');
            $table->string('name');
            $table->integer('cue');
            $table->string('email')->unique();
            $table->boolean('bilingual');
            $table->integer('avg_number_students');
            $table->string('director');
            $table->string('address');
            $table->integer('internal_phone')->nullable();
            $table->integer('phone');
            $table->string('orientation');

            // columnas de otras tablas
            $table->UnsignedInteger('type_id');
            $table->UnsignedInteger('sector_id');
            $table->UnsignedInteger('level_id');
            $table->UnsignedInteger('area_id');
            $table->UnsignedInteger('typeJourney_id');
            $table->UnsignedInteger('typeHighSchool_id');
            $table->UnsignedInteger('category_id');
            $table->UnsignedInteger('locality_id');
            $table->UnsignedInteger('responsable_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('typeJourney_id')->references('id')->on('type_journeys');
            $table->foreign('typeHighSchool_id')->references('id')->on('type_high_schools');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('locality_id')->references('id')->on('localities');
            $table->foreign('responsable_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
