<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Spp_Cp_Saf extends Model
{


    public function ubigeo(){
        return $this->belongsTo('App\Ubigeo');
    }

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
}
