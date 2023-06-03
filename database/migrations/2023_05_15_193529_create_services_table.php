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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->nullable();
            $table->integer('durasi')->nullable();
            $table->integer('biaya')->nullable();
            $table->string('spesialis')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('rating')->nullable();
            $table->text('disclaimer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
