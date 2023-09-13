<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TRIGGER_NAME = 't_barang_stok';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS " . $this::TRIGGER_NAME);
        DB::unprepared(
            "CREATE TRIGGER " . $this::TRIGGER_NAME .
            " AFTER INSERT ON barang FOR EACH ROW
            BEGIN
                INSERT INTO stok (id_barang,id_cabang,harga,stok)
                SELECT NEW.id_barang, id_cabang,0,0 FROM cabang ;
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