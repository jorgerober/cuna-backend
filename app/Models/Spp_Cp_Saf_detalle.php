<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Spp_Cp_Saf_detalle extends Model
{


    public function spp_cg_scd(){
        return $this->belongsTo('App\SPP_CG_SAF','SPP_CP_SAF_id');
    }

    public function respuesta(){
        return $this->belongsTo('App\Respuesta');
    }
}
