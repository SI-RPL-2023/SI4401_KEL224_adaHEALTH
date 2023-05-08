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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('id_obat')->nullable();
            $table->bigInteger('id_hospital')->nullable();
            $table->bigInteger('id_apotek')->nullable();
            $table->bigInteger('id_rating_apotek')->nullable();
            $table->bigInteger('id_rating_hospital')->nullable();
            $table->string('type')->nullable();
            $table->string('qty_item')->nullable();
            $table->integer('total_harga')->nullable();
            $table->string('metode_payment')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
