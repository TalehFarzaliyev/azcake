<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_attribute_id');
            $table->string('name', 50);
            $table->string('locale', 2)->index();
            //$table->unique(['product_attribute_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_translations');
    }
}