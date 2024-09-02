<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenovacionsTarapacaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tarapaca')->create('renovacions_tarapaca', function (Blueprint $table) {
            $table->id();
            $table->string('ci_nit');
            $table->string('nombre_contribuyente');
            $table->string('direccion');
            $table->string('numero_casa');
            $table->string('zona');
            $table->string('difunto');
            $table->decimal('monto', 10, 2); // Utiliza decimal para el campo de monto
            $table->date('fecha_renovacion');
            $table->date('fecha_vencimiento');
            $table->string('comprobante_renovacion')->nullable();
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
        Schema::connection('tarapaca')->dropIfExists('renovacions_tarapaca');
    }
}
