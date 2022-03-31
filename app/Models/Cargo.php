<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{

    protected $fillable = ['id', 'descripcion', 'prefijo'];

    public function asignacionCargos(){
        return $this->hasMany('App\AsignacionCargo','asignacion_cargo_id');
    }
}
