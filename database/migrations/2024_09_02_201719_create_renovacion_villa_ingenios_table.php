<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenovacionVillaIngeniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renovacion_villa_ingenios', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->string('ci_nit', 255); // C.I o NIT
            $table->string('nombre_contribuyente', 255); // Nombre del contribuyente
            $table->string('direccion', 255); // Dirección
            $table->string('numero_casa', 255); // Número de casa
            $table->string('zona', 255); // Zona
            $table->string('difunto', 255); // Nombre del difunto
            $table->string('monto', 255); // Monto de la renovación
            $table->date('fecha_renovacion'); // Fecha de la renovación
            $table->date('fecha_vencimiento'); // Fecha de vencimiento de la renovación
            $table->string('comprobante_renovacion')->nullable(); // Archivo del comprobante de renovación
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renovacion_villa_ingenios');
    }
}
