<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoScdDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_scd_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seguimiento_scd_id')->constrained('seguimiento_scds')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreignId('pregunta_id')->constrained('preguntas');
            $table->foreignId('respuesta_id')->constrained('respuestas');
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
        Schema::dropIfExists('seguimiento_scd_detalles');
    }
}
