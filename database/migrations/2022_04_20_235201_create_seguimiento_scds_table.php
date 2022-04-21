<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoScdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_scds', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaRegistro');
            $table->string('numeroUsuario');
            $table->string('numeroMadre');
            $table->string('servicio');
            $table->string('local');
            $table->string('aspecto');
            $table->string('accion');
            $table->string('accionImplementa');
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
        Schema::dropIfExists('seguimiento_scds');
    }
}
