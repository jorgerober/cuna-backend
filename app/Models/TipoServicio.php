<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TipoServicio extends Model
{

    public function ubigeos(){
        return $this->hasMany('App\Ubigeo');
    }
}
