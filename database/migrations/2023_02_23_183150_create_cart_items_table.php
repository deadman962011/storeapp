<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("product_id")->index()->unsigned();
            $table->BigInteger("cart_id")->index()->unsigned();
            $table->integer('quantity')->default(1);
            $table->foreign('product_id')->references('id')->on('store_products')->onDelete('cascade')->nullable();
            $table->foreign('cart_id')->references('id')->on('store_carts')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('cart_items');
    }
};
