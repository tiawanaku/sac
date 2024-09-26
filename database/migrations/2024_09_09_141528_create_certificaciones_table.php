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
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->id();
        
            $table->string('ci_nit')->nullable();
            $table->string('nombre_contribuyente')->nullable();
            $table->string('direccion')->nullable();
            $table->string('numero_puerta')->nullable();
            $table->string('zona')->nullable();
            $table->string('numero_comprobante')->nullable();
            $table->string('difunto')->nullable();
            
            // Campos adicionales agregados
            $table->string('apellido_paterno_difunto')->nullable();
            $table->string('apellido_materno_difunto')->nullable();
            $table->string('apellido_esposa_difunto')->nullable();
            $table->string('apellido_paterno_contribuyente')->nullable();
            $table->string('apellido_materno_contribuyente')->nullable();
            $table->string('apellido_esposa_contribuyente')->nullable();
        
            $table->decimal('monto', 10, 2)->nullable();
            $table->text('nota_director_servicios_municipales')->nullable();
            $table->string('fotocopia_cedula_identidad_usuario')->nullable();
            $table->string('fotocopia_documento_certificacion')->nullable();
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificaciones');
    }
};