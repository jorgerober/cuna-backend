<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->id();
            $table->string('nomApe',150);
            $table->string('DNI',12);
            $table->string('celular',30);
            $table->string('correo',50);
            $table->string('genero',3);
            $table->timestamps();

        });

        DB::table('personales')->insert(array(
            'id'                         => '1',
            'nomApe'                     => 'Jorge Rober Chaca Hidalgo',
            'dni'                        => '43866929',
            'celular'                    => '934106413',
            'correo'                     => 'jorgeroberch@gmail.com',
            'genero'                     => 'M',
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
        Schema::dropIfExists('personales');
    }
}
