<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obitos', function (Blueprint $table) {
            $table->id();
            $table->string('ci_nit')->nullable();
            $table->string('nombre_contribuyente')->nullable();
            $table->string('direccion')->nullable();
            $table->string('numero_casa')->nullable();
            $table->string('zona')->nullable();
            $table->string('numero_comprobante')->nullable();
            $table->string('difunto')->nullable();
            $table->decimal('monto', 10, 2)->nullable();
            $table->text('nota_director_servicios_municipales')->nullable();
            $table->text('fotocopias_comprobantes_entierro_ultima_renovacion')->nullable();
            $table->text('fotocopia_cedula_identidad_fallecido')->nullable();
            $table->text('fotocopia_cedula_identidad_solicitante')->nullable();
            $table->text('orden_judicial')->nullable();
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
        Schema::dropIfExists('obitos');
    }
}
