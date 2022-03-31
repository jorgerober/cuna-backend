<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });
        DB::table('estados')->insert(array('id'=>'1','descripcion'=>'Activo','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('estados')->insert(array('id'=>'2','descripcion'=>'Inactivo','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
