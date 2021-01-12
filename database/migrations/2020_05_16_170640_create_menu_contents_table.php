<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('page_id')->default(0);
            $table->unsignedBigInteger('category_id')->default(0);
            $table->integer('parent_id')->default(0);
            $table->string('route')->nullable();
            $table->string('lang')->default('messages.error');
            $table->tinyInteger('free')->default(0);
            $table->tinyInteger('sort')->default(0);
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_contents');
    }
}
