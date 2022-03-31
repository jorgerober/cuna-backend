<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgUtOctDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SG_UT_OCT_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('SG_UT_OCT_id')->constrained('SG_UT_OCT')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreignId('pregunta_id')->constrained('preguntas');
            $table->foreignId('respuesta_id')->constrained('respuestas');
            $table->string('comentarioEvidencias');
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
        Schema::dropIfExists('SG_UT_OCT_detalles');
    }
}
