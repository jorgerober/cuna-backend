<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ubigeo extends Model
{
    protected $table='ubigeos';
    protected $fillable = ['id','codigoUbigeo','departamento','provincia','distrito','comiteGestion','tipo_servicio_id','unidad_territorial_id'];

    public function TipoServicio(){
        return $this->belongsTo(TipoServicio::class , 'tipo_servicio_id');
    }
    public function UnidadTerritorial(){
        return $this->belongsTo(UnidadTerritorial::class , 'unidad_territorial_id');
    }
}
