<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     DB::unprepared('
    //     CREATE TRIGGER mobil_masuk AFTER INSERT on stok_mobils
    //     FOR EACH ROW 
    //     BEGIN
	//         UPDATE datmobs
    //             set stok = stok + NEW.Jumlah
    //         WHERE 
    //             id_mobil = NEW.id_mobil;
    //     END
    //     ');
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER mobil_masuk');
    }
};
