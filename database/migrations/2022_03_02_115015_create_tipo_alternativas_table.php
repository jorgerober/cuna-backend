<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateTipoAlternativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_alternativas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });
        DB::table('tipo_alternativas')->insert(array('id'=>'1','descripcion'=>'Dicotomica','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('tipo_alternativas')->insert(array('id'=>'2','descripcion'=>'Tricotomica 1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('tipo_alternativas')->insert(array('id'=>'3','descripcion'=>'Tricotomica 2','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('tipo_alternativas')->insert(array('id'=>'4','descripcion'=>'Cuatrotomica 1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('tipo_alternativas')->insert(array('id'=>'5','descripcion'=>'Cuatrotomica 2','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('tipo_alternativas')->insert(array('id'=>'6','descripcion'=>'Cuatrotomica 3','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_respuestas');
    }
}
