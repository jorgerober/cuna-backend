<?php
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',100);
            $table->string('prefijo',15);
            $table->timestamps();
        });
        DB::table('cargos')->insert(array('id'=>'1','descripcion'=>'COORDINADOR/A DEL SERVICIO DE ACOMPAÑAMIENTO A FAMILIAS','prefijo'=>'CSAF','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('cargos')->insert(array('id'=>'2','descripcion'=>'COORDINADOR/A DEL SERVICIO DE CUIDADO DIURNO','prefijo'=>'CSCD','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('cargos')->insert(array('id'=>'3','descripcion'=>'ESPECIALISTA EN NUTRICION','prefijo'=>'EN','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('cargos')->insert(array('id'=>'4','descripcion'=>'ESPECIALISTA INTEGRAL','prefijo'=>'EI','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
