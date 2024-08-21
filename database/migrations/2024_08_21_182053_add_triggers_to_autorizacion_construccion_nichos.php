<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE TRIGGER actualizar_costo_total
            BEFORE INSERT ON autorizacion_construccion_nichos
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = IFNULL(NEW.costo_formulario, 0) + IFNULL(NEW.costo, 0);
            END
        ");

        DB::statement("
            CREATE TRIGGER actualizar_costo_total_actualizacion
            BEFORE UPDATE ON autorizacion_construccion_nichos
            FOR EACH ROW
            BEGIN
                SET NEW.costo_total = IFNULL(NEW.costo_formulario, 0) + IFNULL(NEW.costo, 0);
            END
        ");
    }

    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS actualizar_costo_total');
        DB::statement('DROP TRIGGER IF EXISTS actualizar_costo_total_actualizacion');
    }
};