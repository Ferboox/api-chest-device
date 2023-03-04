<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    use HasFactory;

    //Tabla de la base de datos.
    protected $table = 'batteries';

    //Datos de la empresa.
    protected $fillable = ['id_device', 'percentage'];
}
