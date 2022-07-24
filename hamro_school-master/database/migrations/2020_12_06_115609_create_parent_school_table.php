<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_school', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('parent_id');
//            $table->unsignedBigInteger('school_id');
            $table->timestamps();


//            $table->foreign('parent_id')->references('id')->on('parents')
//                ->onDelete('CASCADE')->onUpdate('CASCADE');
//            $table->foreign('school_id')->references('id')->on('schools')
//                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_school');
    }
}
