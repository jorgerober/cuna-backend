<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadTerritorial extends Model
{
    protected $table='unidad_territoriales';

    protected $fillable = ['id','descripcion'];

}
