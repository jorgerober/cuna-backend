<?php
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',150);
            $table->string('prefijo',10);
            $table->timestamps();

        });
        DB::table('roles')->insert(array('id'=>'1','descripcion'=>'Administrador','prefijo'=>'admin','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('roles')->insert(array('id'=>'2','descripcion'=>'especialista','prefijo'=>'esp','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
        DB::table('roles')->insert(array('id'=>'3','descripcion'=>'observador','prefijo'=>'obs','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
