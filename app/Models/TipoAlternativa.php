<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoAlternativa extends Model
{

    protected $fillable = ['id', 'descripcion'];

    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }

    public function respuestas(){
        return $this->hasMany(Respuesta::class);
    }
}
