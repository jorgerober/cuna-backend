<?php
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTipoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('prefijo');
            $table->timestamps();

        });
        DB::table('tipo_servicios')->insert(array('id'=>'1','descripcion'=>'SAF','prefijo'=>'SAF','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('tipo_servicios')->insert(array('id'=>'2','descripcion'=>'SCD','prefijo'=>'SCD','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_servicios');
    }
}
