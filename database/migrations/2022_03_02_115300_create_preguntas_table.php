<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('descripcion',500);
            $table->unsignedBigInteger('seccion_id');
            $table->unsignedBigInteger('tipo_alternativa_id');
            $table->timestamps();

            $table->foreign('seccion_id')->references('id')->on('secciones')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('tipo_alternativa_id')->references('id')->on('tipo_alternativas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
