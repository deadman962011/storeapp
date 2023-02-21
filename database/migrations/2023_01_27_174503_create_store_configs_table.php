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
        Schema::create('store_configs', function (Blueprint $table) {
            $table->id();
            $table->string('config_type');
            $table->string('config_name');
            $table->string('config_key');
            $table->string('config_value');
            $table->string('config_sub_value');
            $table->text('config_desc');
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
        Schema::dropIfExists('store_configs');
    }
};
