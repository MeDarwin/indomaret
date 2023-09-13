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
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id('id_log');
            $table->string('on_table', 30)->nullable(false);
            $table->enum('action', ['INSERT', 'UPDATE', 'DELETE'])->nullable(false);
            $table->string('value_affected', 100)->nullable(false);
            $table->timestamps();
            // $table->unsignedBigInteger('affected_by')->nullable(false);

            // $table->foreign('affected_by')->references('id_akun')->on('tbl_akun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activities');
    }
};