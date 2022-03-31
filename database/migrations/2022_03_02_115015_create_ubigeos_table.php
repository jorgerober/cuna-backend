<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateUbigeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubigeos', function (Blueprint $table) {
            $table->id();
            $table->string('codigoUbigeo',10);
            $table->string('departamento',50);
            $table->string('provincia',50);
            $table->string('distrito',50);
            $table->string('comiteGestion',250);
            $table->unsignedBigInteger('unidad_territorial_id');
            $table->unsignedBigInteger('tipo_servicio_id');
            $table->timestamps();
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios');
            $table->foreign('unidad_territorial_id')->references('id')->on('unidad_territoriales');
        });

        DB::table('ubigeos')->insert(array(
            'id'                         => '1',
            'codigoUbigeo'               => '01',
            'departamento'               => 'depa',
            'provincia'                  => 'pro',
            'distrito'                   => 'dist',
            'comiteGestion'              => 'comitGest',
            'unidad_territorial_id'      => '1',
            'tipo_servicio_id'           => '1',
            'created_at'                 => Carbon::now(),
            'updated_at'                 => Carbon::now()


        ));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubigeos');
    }
}
