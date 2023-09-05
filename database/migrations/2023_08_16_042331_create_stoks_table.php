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
        Schema::create('stok', function (Blueprint $table) {
            $table->id('id_stok');
            $table->unsignedBigInteger('id_barang')->nullable(false)->index();
            $table->unsignedBigInteger('id_cabang')->nullable(false)->index();
            $table->unsignedFloat('harga',10,2)->nullable(false);
            $table->unsignedInteger('stok')->default(0)->nullable(false);

            $table->foreign('id_barang')->references('id_barang')->on('barang')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};