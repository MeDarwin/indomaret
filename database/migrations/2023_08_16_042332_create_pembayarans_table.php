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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_transaksi')->nullable(false)->index();
            $table->unsignedInteger('harga_total')->nullable(false);
            $table->unsignedInteger('total_diskon')->nullable(false)->default(0);
            $table->unsignedInteger('uang_pembayaran')->nullable(false);
            $table->unsignedInteger('uang_kembali')->nullable(false);

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};