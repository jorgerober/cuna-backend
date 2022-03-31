<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppCgScdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SPP_CP_SCD', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaRegistro');
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
        Schema::dropIfExists('SPP_CP_SCD');
    }
}
