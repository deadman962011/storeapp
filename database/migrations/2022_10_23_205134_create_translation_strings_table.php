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
        Schema::create('translation_strings', function (Blueprint $table) {
            $table->id();
            $table->string('translation_key');
            $table->string('translation_value')->nullable();
            $table->string('translation_lang');
            $table->string('translation_parent_type');
            $table->string('translation_parent_id');
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
        Schema::dropIfExists('translation_strings');
    }
};
