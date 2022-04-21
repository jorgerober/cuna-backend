<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoScdDetalle extends Model
{
    protected $table = 'seguimiento_scd_detalles';

    protected $fillable = ['seguimiento_scd_id', 'pregunta_id', 'respuesta_id'];

    protected $guarded = ["id"];
}
