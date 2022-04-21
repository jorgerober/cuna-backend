<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoSafDetalle extends Model
{
    protected $table = 'seguimiento_saf_detalles';

    protected $fillable = ['seguimiento_saf_id', 'pregunta_id', 'respuesta_id'];

    protected $guarded = ["id"];
}
