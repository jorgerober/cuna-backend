<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Respuesta extends Model
{

    protected $table = 'respuestas';

    public function tipo(){
        return $this->belongsTo(TipoAlternativa::class, 'tipo_alternativa_id');
    }

}
