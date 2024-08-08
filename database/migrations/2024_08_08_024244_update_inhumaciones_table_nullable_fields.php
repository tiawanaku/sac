<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inhumaciones', function (Blueprint $table) {
            $table->string('fila_ubicacion')->nullable()->change();
            $table->string('sector_ubicacion')->nullable()->change();
            $table->string('nro_ubicacion')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('inhumaciones', function (Blueprint $table) {
            $table->string('fila_ubicacion')->nullable(false)->change();
            $table->string('sector_ubicacion')->nullable(false)->change();
            $table->string('nro_ubicacion')->nullable(false)->change();
        });
    }
};

