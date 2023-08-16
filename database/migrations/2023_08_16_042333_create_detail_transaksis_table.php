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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi')->index()->nullable(false);
            $table->unsignedBigInteger('id_barang')->index()->nullable(false);
            $table->unsignedBigInteger('id_pembayaran')->index()->nullable(false);

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};