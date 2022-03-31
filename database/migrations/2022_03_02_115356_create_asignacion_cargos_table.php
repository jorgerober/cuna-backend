<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateAsignacionCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_cargos', function (Blueprint $table) {
            $table->id();// autoincrement, "id", unsigned
            $table->dateTime('fechaAsignacion');
            $table->date('fechaInicio');
            $table->date('fechaTermino')->nullable();
            $table->string('tipoContrato',20)->nullable();
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('unidad_territorial_id');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();
            //CLAVES FORANEAS
            $table->foreign('cargo_id')->references('id')->on('cargos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('rol_id')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('personal_id')->references('id')->on('personales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('unidad_territorial_id')->references('id')->on('unidad_territoriales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });

        DB::table('asignacion_cargos')->insert(array(
            'id'                         => '1',
            'fechaAsignacion'            => Carbon::now(),
            'fechaInicio'                => Carbon::now(),
            'fechaTermino'               => null,
            'tipoContrato'               => 'CAS',
            'personal_id'                => '1',
            'cargo_id'                   => '1',
            'rol_id'                     => '1',
            'unidad_territorial_id'      => '1',
            'estado_id'                  => '1',
            'created_at'                 => Carbon::now(),
            'updated_at'                 => Carbon::now(),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_cargos');
    }
}
