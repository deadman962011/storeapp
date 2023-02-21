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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_permalink')->unique();
            $table->string('product_type');
            $table->boolean('product_status')->nullable()->default(true);
            $table->BigInteger("parent_id")->index()->unsigned()->nullable();
            $table->BigInteger("product_category")->index()->unsigned();
            $table->BigInteger("product_brand")->index()->unsigned();
            $table->BigInteger("product_vendor")->index()->unsigned();
            $table->foreign('parent_id')->references('id')->on('products')->onDelete('cascade')->nullable();
            $table->foreign('product_category')->references('id')->on('product_categories')->onDelete('cascade')->nullable();
            $table->foreign('product_brand')->references('id')->on('product_brands')->onDelete('cascade')->nullable();
            $table->foreign('product_vendor')->references('id')->on('store_vendors')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('products');
    }
};
