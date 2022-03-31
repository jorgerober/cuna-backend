<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateUnidadTerritorialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_territoriales', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });
        DB::table('unidad_territoriales')->insert(array('id'=>'1','descripcion'=>'AMAZONAS','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'2','descripcion'=>'ANCASH','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'3','descripcion'=>'ANCASH CT CHIMBOTE','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'4','descripcion'=>'APURIMAC','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'5','descripcion'=>'APURIMAC CT ANDAHUAYLAS','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'6','descripcion'=>'AREQUIPA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'7','descripcion'=>'AYACUCHO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'8','descripcion'=>'CAJAMARCA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'9','descripcion'=>'CAJAMARCA CT JAEN','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'10','descripcion'=>'CALLAO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'11','descripcion'=>'CUSCO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'12','descripcion'=>'HUANCAVELICA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'13','descripcion'=>'HUANUCO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'14','descripcion'=>'ICA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'15','descripcion'=>'JUNIN','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'16','descripcion'=>'JUNIN CT LA MERCED','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'17','descripcion'=>'LA LIBERTAD','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'18','descripcion'=>'LAMBAYEQUE','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'19','descripcion'=>'LIMA METROPOLITANA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'20','descripcion'=>'LIMA METROPOLITANA CT CAŃETE','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'21','descripcion'=>'LIMA PROVINCIA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'22','descripcion'=>'LORETO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'23','descripcion'=>'LORETO CT YURIMAGUAS','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'24','descripcion'=>'MADRE DE DIOS','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'25','descripcion'=>'MOQUEGUA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'26','descripcion'=>'PASCO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'27','descripcion'=>'PIURA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'28','descripcion'=>'PUNO','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'29','descripcion'=>'SAN MARTIN','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'30','descripcion'=>'TACNA','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'31','descripcion'=>'TUMBES','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'32','descripcion'=>'UCAYALI','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('unidad_territoriales')->insert(array('id'=>'33','descripcion'=>'VRAEM','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_territoriales');
    }
}
