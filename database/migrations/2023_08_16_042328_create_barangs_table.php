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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->unsignedBigInteger('id_cabang')->nullable(false)->index();
            $table->string('nama_barang', 100)->nullable(false);
            $table->unsignedInteger('harga')->nullable(false);
            $table->unsignedInteger('stok')->default(0);
            $table->datetimes();

            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};