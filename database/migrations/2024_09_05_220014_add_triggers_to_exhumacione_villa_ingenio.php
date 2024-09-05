<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTriggersToExhumacioneVillaIngenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop triggers if they already exist
        DB::unprepared("
            DROP TRIGGER IF EXISTS actualizar_costo_total;
            DROP TRIGGER IF EXISTS actualizar_costo_total_al_actualizar;
        ");

        // Create triggers
        DB::unprepared("
            CREATE TRIGGER actualizar_costo_total
            BEFORE INSERT ON exhumacione_villa_ingenio
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = NEW.costo_formulario + NEW.costo_servicio;
            END;

            CREATE TRIGGER actualizar_costo_total_al_actualizar
            BEFORE UPDATE ON exhumacione_villa_ingenio
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = NEW.costo_formulario + NEW.costo_servicio;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("
            DROP TRIGGER IF EXISTS actualizar_costo_total;
            DROP TRIGGER IF EXISTS actualizar_costo_total_al_actualizar;
        ");
    }
}