<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->string('model');
            $table->json('category_id');
            $table->integer('price');
            $table->string('engine');
            $table->string('transmission');
            $table->string('fuel');
            $table->string('front_img');
            $table->string('side_img');
            $table->string('back_img');
            $table->string('inside_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
