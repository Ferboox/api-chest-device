<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;

    //Tabla de la base de datos.
    protected $table = 'coordinates';

    //Datos de la empresa.
    protected $fillable = ['id_device','x', 'y'];
}
