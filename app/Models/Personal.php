<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Personal extends Model
{

    protected $table = 'personales';
    protected $fillable = ['nomApe', 'DNI', 'celular', 'correo', 'genero'];

    protected $guarded = ["id"];

    public function estado(){
        return $this->belongsTo( Estado::class);
    }
}
