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
        Schema::create('dattrans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('mobil');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dattrans');
    }
};
