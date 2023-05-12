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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('title_content')->nullable();
            $table->text('isi_content')->nullable();
            $table->text('title_content2')->nullable();
            $table->text('isi_content2')->nullable();
            $table->text('title_content3')->nullable();
            $table->text('isi_content3')->nullable();
            $table->text('title_content4')->nullable();
            $table->text('isi_content4')->nullable();
            $table->string('category');
            $table->string('images');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
