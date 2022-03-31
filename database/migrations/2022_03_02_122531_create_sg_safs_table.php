<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgSafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SG_SAF', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaRegistro');
            $table->string('nomApeUsuario',100);
            $table->string('dniUsuario',4);
            $table->string('condicion',4);
            $table->date('fechaNacimiento');
            $table->timestamps();

            $table->foreignId('ubigeo_id')->constrained('ubigeos');
            $table->foreignId('personal_id')->constrained('personales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SPP_CP_SAF');
    }
}
