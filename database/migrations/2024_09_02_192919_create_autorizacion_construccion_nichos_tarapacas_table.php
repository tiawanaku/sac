<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('autorizacion_construccion_nichos_tarapacas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_contribuyente');
            $table->string('ci_nit');
            $table->string('avenida_calle');
            $table->string('numero');
            $table->string('zona');
            $table->string('numero_celular')->nullable();
            $table->string('actividad');
            $table->string('nombre_difunto');
            $table->timestamp('fecha_autorizacion');
            $table->string('comprobante_pdf')->nullable();
            $table->decimal('costo_formulario', 10, 2);
            $table->decimal('costo', 10, 2);
            $table->decimal('costo_total', 10, 2); // Asegúrate de que esta columna esté aquí

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizacion_construccion_nichos_tarapacas');
    }
};