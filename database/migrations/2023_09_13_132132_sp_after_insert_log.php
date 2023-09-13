<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const SP_NAME = 'AfterInsertLog';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(
            "CREATE PROCEDURE " 
            . $this::SP_NAME .
            " (OnTable TEXT, ValAffected TEXT)
            MODIFIES SQL DATA
            BEGIN
                INSERT INTO log_activities (on_table,action,value_affected,created_at,updated_at)
                VALUES (OnTable,'INSERT',ValAffected,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());
            END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS " . $this::SP_NAME);
    }
};