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
        Schema::create('datmobs', function (Blueprint $table) {
            $table->id();
            $table->string('id_mobil');
            $table->string('nama');
            $table->string('merk');
            $table->string('stok');
            $table->string('tahun_keluaran');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datmobs');
    }
};
