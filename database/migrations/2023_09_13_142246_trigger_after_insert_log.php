<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TABLES = [
        'barang',
        'cabang',
        'detail_transaksi',
        'jadwal',
        'kasir',
        'pembayaran',
        'perusahaan',
        'stok',
        'tbl_akun',
        'transaksi'
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this::TABLES as $table_name) {
            $id = "id_$table_name";
            if ($table_name === 'tbl_akun')
                $id = 'id_akun';
            DB::unprepared("DROP TRIGGER IF EXISTS t_after_insert_$table_name");
            DB::unprepared(
                "CREATE TRIGGER t_after_insert_$table_name
                AFTER INSERT ON $table_name FOR EACH ROW
                BEGIN
                SET @NewVal = NEW.$id;
                CALL AfterInsertLog('$table_name', @NewVal);
                END"
            );
        }
        ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this::TABLES as $table_name) {
            DB::unprepared("DROP TRIGGER IF EXISTS t_after_insert_$table_name");
        }
        ;
    }
};