<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inhumaciones', function (Blueprint $table) {
            $table->id();
        
            // Campos del difunto
            $table->string('nombres_difunto');
            $table->string('apellido_paterno_difunto');
            $table->string('apellido_materno_difunto')->nullable();
            $table->string('apellido_esposa_difunto')->nullable();
            $table->string('numero_carnet_difunto')->nullable(); // Nuevo campo
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->integer('edad')->unsigned();
            $table->enum('estado_civil', ['soltero', 'casado', 'divorciado', 'viudo']);
            $table->string('nacionalidad');
            $table->string('diagnostico_fallecimiento');
            $table->string('medico');
            $table->string('orc');
            $table->string('libro');
            $table->string('folio');
            $table->date('fecha_inhumacion');
            $table->date('fecha_vencimiento');
            $table->string('dia');
            $table->text('descripcion_nicho');
        
            // Campos del contribuyente (anteriormente solicitante)
            $table->string('nombres_contribuyente'); // Actualizado
            $table->string('apellido_paterno_contribuyente')->nullable(); // Actualizado y marcado como nullable
            $table->string('apellido_materno_contribuyente')->nullable(); // Actualizado y marcado como nullable
            $table->string('apellido_esposa_contribuyente')->nullable(); // Actualizado y marcado como nullable
            $table->string('carnet_identidad');
            $table->string('celular');
            $table->string('direccion');
            $table->string('numero');
            $table->string('zona');
        
            // Campo número de comprobante
            $table->string('numero_comprobante')->nullable();
        
            // Campos de ubicación
            $table->string('fila_ubicacion')->nullable();
            $table->string('sector_ubicacion')->nullable();
            $table->string('nro_ubicacion')->nullable();
        
            // Campos de archivos
            $table->string('comprobante_pdf')->nullable();
            $table->string('testigos_pdf')->nullable();
            $table->string('familiares_pdf')->nullable();
            $table->string('defuncion_pdf')->nullable();
        
            $table->timestamps();
        });
        
        
        
    }

    public function down(): void
    {
        Schema::dropIfExists('inhumaciones');
    }
};
