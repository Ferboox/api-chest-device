<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    //Tabla de la base de datos.
    protected $table = 'fields';

    //Datos de la empresa.
    protected $fillable = ['height', 'width', 'name'];
}
