<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    //Tabla de la base de datos.
    protected $table = 'times';

    //Datos de la empresa.
    protected $fillable = ['seconds'];
}
