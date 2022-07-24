<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();


            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('CASCADE');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_teacher');
    }
}
