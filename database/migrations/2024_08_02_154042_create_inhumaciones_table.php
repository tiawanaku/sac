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
            $table->string('nombre_difunto');
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
            $table->string('nombre_apellido_solicitante');
            $table->string('carnet_identidad');
            $table->string('celular');
            $table->string('direccion');
            $table->string('numero');
            $table->string('zona');
            // Nuevos campos con valores nulos permitidos
            $table->string('fila_ubicacion')->nullable();
            $table->string('sector_ubicacion')->nullable();
            $table->string('nro_ubicacion')->nullable();
            $table->timestamps();

            // Si tienes una relación con otra tabla, añade la clave foránea aquí
            // $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete('cascade');
            // $table->unsignedBigInteger('ubicacion_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inhumaciones');
    }
};
