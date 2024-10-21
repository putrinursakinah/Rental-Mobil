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
        Schema::create('datpens', function (Blueprint $table) {
            $table->id();
            // $table->string('id_mk');
            $table->string('id_penyewa');
            $table->string('nama');
            $table->string('notelp');
            $table->string('email');
            $table->string('alamat');
            // $table->string('merk_mobil');
            // $table->string('jumlah', 8, 2);
            // $table->string('jenis_diskon');
            // $table->string('diskon')->default(0);
            // $table->dateTime('tgl_pinjam');
            // $table->dateTime('tgl_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datpens');
    }
};
