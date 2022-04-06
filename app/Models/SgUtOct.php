<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SgUtOct extends Model
{
    protected $table = 'sg_ut_oct';

    protected $fillable = ['fechaRegistro', 'ubigeo_id', 'personal_id'];

    protected $guarded = ["id"];

    public function scopeFiltered(Builder $builder): Builder
    {
        $search = request('search') ?? null;

        $assignments = $builder->select('id', 'fechaRegistro', 'ubigeo_id', 'personal_id')
            ->with(['personal', 'ubigeo']);

        return $assignments;
    }

    public function personal(){
        return $this->belongsTo(Personal::class);

    }

    public function ubigeo(){
        return $this->belongsTo(Ubigeo::class);
    }






}
