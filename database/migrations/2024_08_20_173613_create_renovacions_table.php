<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenovacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renovacions', function (Blueprint $table) {
            $table->id();
            $table->string('ci_nit');
            $table->string('nombre_contribuyente');
            $table->string('direccion');
            $table->string('numero_casa');
            $table->string('zona');
            $table->string('difunto');
            $table->string('monto');
            $table->date('fecha_renovacion');
            $table->date('fecha_vencimiento');
        
            // Campos adicionales agregados
            $table->string('numero_comprobante');
            $table->string('apellido_paterno_difunto');
            $table->string('apellido_materno_difunto')->nullable();
            $table->string('apellido_esposa_difunto')->nullable();
            $table->string('apellido_paterno_solicitante');
            $table->string('apellido_materno_solicitante')->nullable();
            $table->string('apellido_esposa_solicitante')->nullable();
        
            $table->string('comprobante_renovacion')->nullable(); // Campo para el archivo
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renovacions');
    }
}
