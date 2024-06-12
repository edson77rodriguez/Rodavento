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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->unsignedBigInteger('id_vendedor');
            $table->unsignedBigInteger('id_cliente');
            $table->integer('num_personas');
            $table->unsignedBigInteger('id_empresa');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_vendedor')->references('id_vendedor')->on('vendedores');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
