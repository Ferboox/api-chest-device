<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    //Tabla de la base de datos.
    protected $table = 'matches';

    //Datos de la empresa.
    protected $fillable = ['start','end'];
}
