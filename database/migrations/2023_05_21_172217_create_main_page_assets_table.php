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
        Schema::create('main_page_assets', function (Blueprint $table) {
            $table->id();
            $table->string('banner_video');
            $table->string('banner_text');
            $table->string('about_img');
            $table->text('about_text');
            $table->json('about_imgs');
            $table->string('location');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_page_assets');
    }
};
