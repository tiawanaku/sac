<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggersForExhumacioneTarapacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Especifica la conexión a la base de datos 'tarapaca'
        Schema::connection('tarapaca')->getConnection()->unprepared('
            CREATE TRIGGER sumar_costos_exhumacion BEFORE INSERT ON exhumacione_tarapacas
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = NEW.costo_formulario + NEW.costo_servicio;
            END
        ');

        Schema::connection('tarapaca')->getConnection()->unprepared('
            CREATE TRIGGER actualizar_costos_exhumacion BEFORE UPDATE ON exhumacione_tarapacas
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = NEW.costo_formulario + NEW.costo_servicio;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar los triggers
        Schema::connection('tarapaca')->getConnection()->unprepared('DROP TRIGGER IF EXISTS sumar_costos_exhumacion');
        Schema::connection('tarapaca')->getConnection()->unprepared('DROP TRIGGER IF EXISTS actualizar_costos_exhumacion');
    }
}