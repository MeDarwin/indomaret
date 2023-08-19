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
        Schema::create('kasir', function (Blueprint $table) {
            $table->id('id_kasir');
            $table->unsignedBigInteger('id_cabang')->index()->unique();
            $table->unsignedBigInteger('id_akun')->index()->unique()->nullable(false);
            $table->string('nama_lengkap', 100)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable(false);
            $table->string('alamat', 100)->nullable(false);
            $table->string('kode_kasir', 150);

            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_akun')->references('id_akun')->on('tbl_akun')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};