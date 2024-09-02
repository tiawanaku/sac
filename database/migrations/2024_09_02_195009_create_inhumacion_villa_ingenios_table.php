<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInhumacionVillaIngeniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inhumacion_villa_ingenios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_difunto');
            $table->string('sexo')->nullable(); // Hacer nullable para coincidir
            $table->integer('edad')->nullable(); // Hacer nullable para coincidir
            $table->string('estado_civil')->nullable(); // Hacer nullable para coincidir
            $table->string('nacionalidad')->nullable(); // Hacer nullable para coincidir
            $table->string('diagnostico_fallecimiento')->nullable(); // Hacer nullable para coincidir
            $table->string('medico')->nullable(); // Hacer nullable para coincidir
            $table->string('orc')->nullable(); // Hacer nullable para coincidir
            $table->string('libro')->nullable(); // Hacer nullable para coincidir
            $table->string('folio')->nullable(); // Hacer nullable para coincidir
            $table->date('fecha_inhumacion')->nullable(); // Hacer nullable para coincidir
            $table->date('fecha_vencimiento')->nullable(); // Hacer nullable para coincidir
            $table->string('dia')->nullable(); // Corregir tipo de dato a string y hacer nullable
            $table->text('descripcion_nicho')->nullable(); // Cambiar a text para coincidir y hacer nullable
            $table->string('nombre_apellido_solicitante')->nullable(); // Hacer nullable para coincidir
            $table->string('carnet_identidad')->nullable(); // Hacer nullable para coincidir
            $table->string('celular')->nullable(); // Hacer nullable para coincidir
            $table->string('direccion')->nullable(); // Hacer nullable para coincidir
            $table->string('numero')->nullable(); // Hacer nullable para coincidir
            $table->string('zona')->nullable(); // Hacer nullable para coincidir
            $table->string('fila_ubicacion')->nullable(); // Hacer nullable para coincidir
            $table->string('sector_ubicacion')->nullable(); // Hacer nullable para coincidir
            $table->string('nro_ubicacion')->nullable(); // Hacer nullable para coincidir
            $table->string('comprobante_pdf')->nullable(); // Hacer nullable para coincidir
            $table->string('testigos_pdf')->nullable(); // Hacer nullable para coincidir
            $table->json('familiares_pdf')->nullable(); // Hacer nullable para coincidir
            $table->string('defuncion_pdf')->nullable(); // Hacer nullable para coincidir

            // Añadir campo ubicacion_id para coincidir con la otra migración
            $table->unsignedBigInteger('ubicacion_id')->nullable();

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
        Schema::dropIfExists('inhumacion_villa_ingenios');
    }
}
