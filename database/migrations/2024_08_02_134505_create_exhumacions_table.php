<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exhumacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_contribuyente');
            $table->string('apellido_paterno_contribuyente'); // Nuevo campo
            $table->string('apellido_materno_contribuyente')->nullable(); // Nuevo campo
            $table->string('apellido_esposa_contribuyente')->nullable(); // Nuevo campo
            $table->string('numero_celular')->nullable(); // Hacerlo opcional
            $table->string('ci_nit');
            $table->string('avenida_calle');
            $table->string('numero_puerta');
            $table->string('zona');
            $table->string('numero_comprobante'); // Nuevo campo
        
            // Campos del difunto
            $table->string('nombre_difunto');
            $table->string('apellido_paterno_difunto');
            $table->string('apellido_materno_difunto')->nullable();
            $table->string('apellido_esposa_difunto')->nullable();
            $table->string('numero_carnet_difunto'); // Nuevo campo
        
            $table->string('motivo_exhumacion');
            $table->timestamp('fecha_exhumacion')->nullable();
            $table->decimal('costo_formulario', 10, 2)->nullable(); // Permitir valores nulos
            $table->decimal('costo_servicio', 10, 2);
            $table->string('comprobante_pdf')->nullable();
            $table->string('autorizacion_pdf')->nullable();
            $table->string('costo_total')->nullable();
            
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Primero elimina el trigger, si existe
        DB::statement("DROP TRIGGER IF EXISTS before_exhumacions_insert");

        // Luego elimina la tabla
        Schema::dropIfExists('exhumacions');
    }
};