<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inhumaciones', function (Blueprint $table) {
            // Agregar la columna 'comprobante_pdf' primero
            if (!Schema::hasColumn('inhumaciones', 'comprobante_pdf')) {
                $table->string('comprobante_pdf')->nullable()->after('nro_ubicacion');
            }

            // Luego agregar las nuevas columnas para PDFs
            $table->string('defuncion_pdf')->nullable()->after('folio');
            $table->string('testigos_pdf')->nullable()->after('comprobante_pdf');
            $table->string('familiares_pdf')->nullable()->after('testigos_pdf');
            
            // Modificar columnas existentes para permitir valores nulos
            $table->string('fila_ubicacion')->nullable()->change();
            $table->string('sector_ubicacion')->nullable()->change();
            $table->string('nro_ubicacion')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('inhumaciones', function (Blueprint $table) {
            // Verificar si las columnas existen antes de eliminarlas
            if (Schema::hasColumn('inhumaciones', 'defuncion_pdf')) {
                $table->dropColumn('defuncion_pdf');
            }
            if (Schema::hasColumn('inhumaciones', 'testigos_pdf')) {
                $table->dropColumn('testigos_pdf');
            }
            if (Schema::hasColumn('inhumaciones', 'familiares_pdf')) {
                $table->dropColumn('familiares_pdf');
            }
            if (Schema::hasColumn('inhumaciones', 'comprobante_pdf')) {
                $table->dropColumn('comprobante_pdf');
            }

            // Revertir cambios en las columnas existentes
            $table->string('fila_ubicacion')->nullable(false)->change();
            $table->string('sector_ubicacion')->nullable(false)->change();
            $table->string('nro_ubicacion')->nullable(false)->change();
        });
    }
};

