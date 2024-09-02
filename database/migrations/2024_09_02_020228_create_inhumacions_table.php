<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInhumacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inhumacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_difunto');
            $table->string('sexo')->nullable();
            $table->integer('edad')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('diagnostico_fallecimiento')->nullable();
            $table->string('medico')->nullable();
            $table->string('orc')->nullable();
            $table->string('libro')->nullable();
            $table->string('folio')->nullable();
            $table->date('fecha_inhumacion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('dia')->nullable();
            $table->text('descripcion_nicho')->nullable();
            $table->string('nombre_apellido_solicitante')->nullable();
            $table->string('carnet_identidad')->nullable();
            $table->string('celular')->nullable();
            $table->string('direccion')->nullable();
            $table->string('numero')->nullable();
            $table->string('zona')->nullable();
            $table->string('fila_ubicacion')->nullable();
            $table->string('sector_ubicacion')->nullable();
            $table->string('nro_ubicacion')->nullable();
            $table->string('comprobante_pdf')->nullable();
            $table->string('testigos_pdf')->nullable();
            $table->json('familiares_pdf')->nullable();
            $table->string('defuncion_pdf')->nullable();
            
            // Cambié 'foreignId' a 'unsignedBigInteger' y eliminé la restricción de clave foránea
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
        Schema::dropIfExists('inhumacions');
    }
}
