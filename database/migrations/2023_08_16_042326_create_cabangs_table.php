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
            $table->unsignedBigInteger('id_perusahaan')->index();
            $table->string('nama', 100);
            $table->string('kode_cabang', 100);
            $table->string('kontak_cabang', 18);
            $table->text('alamat');

            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')
                ->onDelete('cascade')->onUpdate('cascade');
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