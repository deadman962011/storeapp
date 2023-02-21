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
        Schema::create('layout_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_type');
            $table->string('item_status');
            $table->string('item_breakpoint');
            $table->string('item_items_count');
            $table->string('item_sort');
            $table->string('attachment_type');
            $table->BigInteger("attachment_id")->index()->unsigned();
            $table->BigInteger("layout_id")->index()->unsigned();
            $table->foreign('layout_id')->references('id')->on('store_layouts')->onDelete('cascade')->nullable();

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
        Schema::dropIfExists('layout_items');
    }
};
