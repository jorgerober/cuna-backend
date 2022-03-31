<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaanDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SAAN_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('SAAN_id')->constrained('SAAN')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreignId('respuesta_id')->constrained('respuestas');
            $table->foreignId('pregunta_id')->constrained('preguntas');
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
        Schema::dropIfExists('SAAN_detalles');
    }
}
