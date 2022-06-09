<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->enum('type', ['admin', 'employee', 'business'])->default('admin');
            $table->string('title');
            $table->string('class')->nullable();
            $table->string('icon')->nullable();
            $table->string('route');
            $table->string('url')->nullable();
            $table->boolean('is_active');
            $table->integer('order');
            $table->text('related_routes')->nullable();
            $table->foreign('group_id')->references('id')->on('menu_groups')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('menus');
    }
}
