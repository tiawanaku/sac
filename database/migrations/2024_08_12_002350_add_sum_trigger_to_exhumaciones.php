<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER before_exhumacions_insert
            BEFORE INSERT ON exhumacions
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = COALESCE(NEW.costo_formulario, 0) + COALESCE(NEW.costo_servicio, 0);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS before_exhumacions_insert
        ');
    }
};