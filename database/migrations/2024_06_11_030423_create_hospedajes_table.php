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
        Schema::create('hospedajes', function (Blueprint $table) {
            $table->id('id_hospedaje');
            $table->string('descripcion');
            $table->decimal('costo_entre_semana',10, 2);
            $table->decimal('costo_volumen',10, 2);
            $table->decimal('costo_fin',10, 2);
            $table->decimal('costo_especial',10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospedajes');
    }
};
