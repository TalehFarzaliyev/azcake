<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->text('image');
            $table->boolean('status')->default(0); // 0 Disable // 1 Enable
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('price', 8, 2)->default(0);
            $table->tinyInteger('is_sale')->default(0);
            $table->tinyInteger('is_home')->default(0);
            $table->tinyInteger('is_popular')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
