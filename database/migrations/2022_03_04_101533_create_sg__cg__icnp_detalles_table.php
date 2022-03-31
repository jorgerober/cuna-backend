<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgCgIcnpDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SG_CG_ICNP_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('SG_CG_ICNP_id')->constrained('SG_CG_ICNP')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::dropIfExists('SG_CG_ICNP_detalles');
    }
}
