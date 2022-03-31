<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppCgScdDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SPP_CP_SCD_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SPP_CP_SCD_id');
            $table->foreignId('respuesta_id')->constrained('respuestas');
            $table->foreignId('pregunta_id')->constrained('preguntas');
            $table->timestamps();
            $table->foreign('SPP_CP_SCD_id')->references('id')->on('SPP_CP_SCD')->onUpdate('RESTRICT')->onDelete('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SPP_CP_SCD_detalles');
    }
}
