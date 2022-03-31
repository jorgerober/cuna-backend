<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgSafDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SG_SAF_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SG_SAF_id');
            $table->foreignId('respuesta_id')->constrained('respuestas');
            $table->timestamps();
            $table->foreign('SG_SAF_id')->references('id')->on('SG_SAF')->onUpdate('RESTRICT')->onDelete('RESTRICT');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SPP_CP_SAF_detalles');
    }
}
