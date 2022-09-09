<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variant_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_variant_one')->nullable();
            $table->unsignedBigInteger('product_variant_two')->nullable();
            $table->unsignedBigInteger('product_variant_three')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->double('price');
            $table->integer('stock')->default(0);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_variant_prices');
    }
}
