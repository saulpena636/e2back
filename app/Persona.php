<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'nombre','apellidos','activo'
    ];
}
