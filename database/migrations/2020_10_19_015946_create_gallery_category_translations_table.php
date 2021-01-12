<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallery_categories_id');
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->string('locale', 2)->index();
            $table->unique(['locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_category_translations');
    }
}
