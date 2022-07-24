<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeratorSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderator_subject', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('moderator_id');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('moderator_id')->references('id')->on('moderators')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moderator_subject');
    }
}
