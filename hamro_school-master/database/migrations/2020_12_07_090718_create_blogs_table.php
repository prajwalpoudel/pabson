<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->morphs('bloggable');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('file')->nullable();
            $table->integer('view_count')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('blogs');
    }
}
