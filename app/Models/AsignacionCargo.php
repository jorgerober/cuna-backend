<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AsignacionCargo extends Model
{

    protected $table = 'asignacion_cargos';
    protected $fillable = ['rol_id', 'cargo_id','estado_id', 'personal_id','ubigeo_id','unidad_territorial_id', 'tipoContrato', 'fechaAsignacion', 'fechaInicio'];
    protected $guarded = ["id"];

    public function scopeFiltered(Builder $builder): Builder
    {
        $search = request('search') ?? null;

        $assignments = $builder->select('id', 'rol_id', 'cargo_id','estado_id', 'personal_id','unidad_territorial_id', 'tipoContrato', 'fechaAsignacion', 'fechaInicio')
            ->with(['rol', 'cargo', 'personal', 'estado', 'unidadTerritorial']);

        if ($search && strlen($search) > 0) {
            $assignments->whereHas('personal' , function ($query) use ($search) {
                $query->where('nomApe', 'LIKE', '%' . $search . '%');
            });
        }

        return $assignments;
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class)->select('id', 'descripcion', 'prefijo');
    }

    public function personal(){
        return $this->belongsTo(Personal::class);

    }

    public function unidadTerritorial(){
        return $this->belongsTo(UnidadTerritorial::class)->select('id', 'descripcion');
    }

    public function rol(){
        return $this->belongsTo( Rol::class)->select('id', 'descripcion');
    }

    public function estado(){
        return $this->belongsTo( Estado::class)->select('id', 'descripcion');
    }

}
