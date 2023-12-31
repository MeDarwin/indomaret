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
        Schema::create("tbl_akun", function (Blueprint $table) {
            $table->id('id_akun');
            $table->string('username', 100)->nullable(false);
            $table->string('password')->nullable(false);
            $table->enum('role',['kasir','owner','management'])->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_akun');
    }
};