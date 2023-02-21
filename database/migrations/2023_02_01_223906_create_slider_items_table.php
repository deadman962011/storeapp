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
        Schema::create('slider_items', function (Blueprint $table) {
            $table->id();
            $table->string('slide_action');
            $table->string('slide_value');
            $table->string('slide_status');
            $table->string('slide_sort');
            $table->string('slide_btn_position');
            $table->BigInteger("slider_id")->index()->unsigned();
            $table->foreign('slider_id')->references('id')->on('store_sliders')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('slider_items');
    }
};
