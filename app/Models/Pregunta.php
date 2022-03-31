<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pregunta extends Model
{

    protected $table = 'preguntas';

    public function seccion(){
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    public function tipo(){
        return $this->belongsTo(TipoAlternativa::class, 'tipo_alternativa_id');
    }

}
