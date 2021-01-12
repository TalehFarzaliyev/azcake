<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleProductAttributesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_product_attributes_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('single_product_attributes_id');
            $table->string('name', 50);
            $table->string('locale', 2)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_product_attributes_translations');
    }
}
