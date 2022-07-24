<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discussion_id');
            $table->unsignedBigInteger('subject_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('discussion_id')->references('id')->on('discussions')->onDelete('CASCADE');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussion_subjects');
    }
}
