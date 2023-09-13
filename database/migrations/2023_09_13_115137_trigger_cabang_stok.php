<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TRIGGER_NAME = 't_cabang_stok';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS " . $this::TRIGGER_NAME);
        DB::unprepared(
            "CREATE TRIGGER " . $this::TRIGGER_NAME .
            " AFTER INSERT ON cabang FOR EACH ROW
            BEGIN
            INSERT INTO stok (id_barang,id_cabang,harga,stok)
            SELECT id_barang,NEW.id_cabang,0,0 FROM barang ;
            END"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS " . $this::TRIGGER_NAME);
    }
};