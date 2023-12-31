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
            $table->id('id_detail_transaksi');
            $table->unsignedBigInteger('id_transaksi')->index()->nullable(false);
            $table->unsignedBigInteger('id_barang')->index()->nullable(false);
            $table->unsignedInteger('jumlah_barang')->nullable(false);

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_barang')->references('id_barang')->on('stok')
                ->cascadeOnDelete()->cascadeOnUpdate();
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