<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgaanUtOctDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SGAAN_UT_OCT_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('SGAAN_UT_OCT_id')->constrained('SGAAN_UT_OCT')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::dropIfExists('SGAAN_UT_OCT_detalles');
    }
}
