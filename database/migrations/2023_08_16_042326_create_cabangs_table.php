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
        Schema::create('cabang', function (Blueprint $table) {
            $table->id('id_cabang');
            $table->unsignedBigInteger('id_perusahaan')->index()->nullable(false);
            $table->string('nama', 100)->nullable(false);
            $table->string('kode_cabang', 100)->nullable(false);
            $table->string('kontak_cabang', 18)->nullable(false);
            $table->text('alamat')->nullable(false);

            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabang');
    }
};