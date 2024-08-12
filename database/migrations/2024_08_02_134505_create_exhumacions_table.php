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
            $table->string('motivo_exhumacion');
            $table->timestamp('fecha_exhumacion');
            $table->decimal('costo_formulario', 10, 2);
            $table->decimal('costo_servicio', 10, 2);
            $table->decimal('costo_total', 10, 2);
            $table->string('comprobante_pdf')->nullable();
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
