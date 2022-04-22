<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SeguimientoScd extends Model
{
    protected $table = 'seguimiento_scds';




    protected $fillable = ['fechaRegistro','fechaReactivacion','servicio','numeroUsuario','numeroMadre','local','aspecto','accion','accionImplementa','refrigerioManana', 'motivo1','refrigerioAlmuerzo','motivo2','refrigerioTarde','motivo3' , 'ubigeo_id', 'personal_id'];

    protected $guarded = ["id"];

    public function scopeFiltered(Builder $builder): Builder
    {
        $search = request('search') ?? null;

        $assignments = $builder->select('id', 'fechaRegistro','fechaReactivacion','servicio','numeroUsuario','numeroMadre','local','aspecto','accion','accionImplementa','refrigerioManana', 'motivo1','refrigerioAlmuerzo','motivo2','refrigerioTarde','motivo3', 'ubigeo_id', 'personal_id')
            ->orderByDesc('id')->with(['personal', 'ubigeo']);

        return $assignments;
    }

    public function personal(){
        return $this->belongsTo(Personal::class);

    }

    public function ubigeo(){
        return $this->belongsTo(Ubigeo::class);
    }






}
