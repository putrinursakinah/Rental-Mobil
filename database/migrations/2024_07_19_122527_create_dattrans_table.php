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
            $table->string('nama');
            $table->string('merk');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_kembali');
            $table->decimal('harga', 15, 3)->default(0);
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
