<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgUtOctDetalle extends Model
{
    protected $table = 'sg_ut_oct_detalles';

    protected $fillable = ['SG_UT_OCT_id', 'pregunta_id', 'respuesta_id', 'comentarioEvidencias'];

    protected $guarded = ["id"];
}
