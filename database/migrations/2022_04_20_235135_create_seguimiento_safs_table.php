<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoSafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_safs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaRegistro');
            $table->date('fechaReactivacion');
            $table->string('servicio');
            $table->string('numeroUsuario');
            $table->string('numeroFacilitadora');
            $table->text('aspecto')->nullable();
            $table->text('accion')->nullable();
            $table->text('accionImplementa')->nullable();
            $table->foreignId('ubigeo_id')->constrained('ubigeos');
            $table->foreignId('personal_id')->constrained('personales');

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
        Schema::dropIfExists('seguimiento_safs');
    }
}
