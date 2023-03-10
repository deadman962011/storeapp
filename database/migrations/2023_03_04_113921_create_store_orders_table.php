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
        Schema::create('store_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_status')->default(0);
            $table->string('order_identifier');
            $table->BigInteger("cart_id")->index()->unsigned();
            $table->BigInteger("user_id")->index()->unsigned();
            $table->BigInteger("payment_id")->index()->unsigned();
            $table->foreign('cart_id')->references('id')->on('store_carts')->onDelete('cascade')->nullable();
            $table->foreign('user_id')->references('id')->on('store_users')->onDelete('cascade')->nullable();
            $table->foreign('payment_id')->references('id')->on('store_payments')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('store_orders');
    }
};
