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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            // $table->string('category_name')->unique();
            // $table->longText('category_description')->nullable();
            $table->string('category_permalink')->unique();
            $table->string('category_type');
            $table->boolean('category_status')->nullable()->default(true);
            $table->BigInteger("parent_id")->index()->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('product_categories')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('product_categories');
    }
};
