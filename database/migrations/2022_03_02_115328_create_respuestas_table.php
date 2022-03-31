<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',10);
            $table->string('valor');
            $table->unsignedBigInteger('tipo_alternativa_id');
            $table->timestamps();
            $table->foreign('tipo_alternativa_id')->references('id')->on('tipo_alternativas')->onUpdate('RESTRICT')->onDelete('RESTRICT');

        });
        DB::table('respuestas')->insert(array('id'=>'1','descripcion'=>'SI','valor'=>'1','tipo_alternativa_id'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'2','descripcion'=>'NO','valor'=>'0','tipo_alternativa_id'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'3','descripcion'=>'SI','valor'=>'1','tipo_alternativa_id'=>'2','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'4','descripcion'=>'NO','valor'=>'0','tipo_alternativa_id'=>'2','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'5','descripcion'=>'NA','valor'=>'2','tipo_alternativa_id'=>'2','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'6','descripcion'=>'SI','valor'=>'1','tipo_alternativa_id'=>'3','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'7','descripcion'=>'NO','valor'=>'0','tipo_alternativa_id'=>'3','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'8','descripcion'=>'EN PROCESO','valor'=>'3','tipo_alternativa_id'=>'3','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'9','descripcion'=>'SI','valor'=>'1','tipo_alternativa_id'=>'4','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'10','descripcion'=>'NO','valor'=>'0','tipo_alternativa_id'=>'4','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'11','descripcion'=>'NA','valor'=>'2','tipo_alternativa_id'=>'4','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('respuestas')->insert(array('id'=>'12','descripcion'=>'EN PROCESO','valor'=>'3','tipo_alternativa_id'=>'4','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
