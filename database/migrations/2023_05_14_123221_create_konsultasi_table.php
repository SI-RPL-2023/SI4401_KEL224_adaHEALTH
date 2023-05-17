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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_pasien');
            $table->string('email_pasien');
            $table->string('penyakit');
            $table->string('obat');
            $table->text('saran');
            $table->enum('rujukan_rs', [0, 1]);
            $table->timestamps();

            $table->foreign('id_dokter')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_pasien')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
