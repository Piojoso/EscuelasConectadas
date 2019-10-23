<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_teacher', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('school_id');
            $table->UnsignedInteger('teacher_id');
            $table->string('division');
            $table->integer('hours');
            $table->string('class');
            $table->enum('situacionRevista', ['Titular', 'Interino', 'Suplente', 'Licencia']);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_teacher');
    }
}
