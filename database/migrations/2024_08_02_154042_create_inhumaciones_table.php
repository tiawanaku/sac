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
        Schema::create('inhumaciones', function (Blueprint $table) {
            $table->id(); // Agrega una columna id auto-incremental
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
            $table->unsignedBigInteger('id'); // Agrega la columna 'ubicacion_id'
            $table->string('fila')->nullable(); // Agrega la columna 'fila'
            $table->string('columna')->nullable(); // Agrega la columna 'columna'
            $table->timestamps(); // Agrega las columnas created_at y updated_at

            // Define la clave foránea para 'ubicacion_id'
            $table->foreign('id')->references('id')->on('ubicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inhumaciones', function (Blueprint $table) {
            // Elimina la clave foránea antes de eliminar la columna
            $table->dropForeign(['ubicacion_id']);
        });

        Schema::dropIfExists('inhumaciones');
    }
};
