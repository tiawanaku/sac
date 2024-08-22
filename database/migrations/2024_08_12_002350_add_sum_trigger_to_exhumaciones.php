<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Trigger para insertar nuevos registros
        DB::statement("
            CREATE TRIGGER actualizar_costo_total_exhumacion
            BEFORE INSERT ON exhumacions
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = IFNULL(NEW.costo_formulario, 0) + IFNULL(NEW.costo_servicio, 0);
            END
        ");

        // Trigger para actualizar registros existentes
        DB::statement("
            CREATE TRIGGER actualizar_costo_total_exhumacion_actualizacion
            BEFORE UPDATE ON exhumacions
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = IFNULL(NEW.costo_formulario, 0) + IFNULL(NEW.costo_servicio, 0);
            END
        ");
    }

    public function down()
    {
        // Elimina el trigger de inserción
        DB::statement('DROP TRIGGER IF EXISTS actualizar_costo_total_exhumacion');

        // Elimina el trigger de actualización
        DB::statement('DROP TRIGGER IF EXISTS actualizar_costo_total_exhumacion_actualizacion');
    }
};