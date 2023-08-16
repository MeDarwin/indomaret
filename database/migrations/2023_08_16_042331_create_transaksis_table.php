<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_kasir')->index()->nullable(false);
            $table->unsignedBigInteger('id_barang')->index()->nullable(false);
            $table->unsignedInteger('jumlah_barang')->nullable(false);
            $table->string('kode_transaksi', 30)->nullable(false); //format : YYYYMMD-HH-ii-s-{id_kasir}
            $table->timestamps();

            $table->foreign('id_kasir')->references('id_kasir')->on('kasir')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_barang')->references('id_barang')->on('barang')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};