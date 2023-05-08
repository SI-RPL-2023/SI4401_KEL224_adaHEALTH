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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter');
            $table->string('spesialis');
            $table->string('email');
            $table->string('alamat');
            $table->string('password');
            $table->string('no_telp');
            $table->string('gender');
            $table->date('tanggal_lahir');
            $table->string('role')->default('dokter');
            $table->text('foto');
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};