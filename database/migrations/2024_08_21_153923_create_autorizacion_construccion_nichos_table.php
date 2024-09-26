<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('autorizacion_construccion_nichos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_contribuyente');
            $table->string('ci_nit');
            $table->string('avenida_calle');
            $table->string('numero');
            $table->string('zona');
            $table->string('numero_celular')->nullable();
            $table->string('actividad');
            $table->string('nombre_difunto');
        
            // Campos adicionales agregados
            $table->string('apellido_paterno_difunto')->nullable();
            $table->string('apellido_materno_difunto')->nullable();
            $table->string('apellido_esposa_difunto')->nullable();
            $table->string('apellido_paterno_solicitante')->nullable();
            $table->string('apellido_materno_solicitante')->nullable();
            $table->string('apellido_esposa_solicitante')->nullable();
        
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
        Schema::dropIfExists('autorizacion_construccion_nichos');
    }
};