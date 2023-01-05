<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    static public function randomInformation($limit)
    {
        $data = [];

        for($i = 0; $i < $limit; $i++){
            array_push($data, [
                'id_device' => $i
            ]);
        }

        return $data;
    }

    static public function randomLocation($id)
    {
        return [
            'id_device' => $id,
            'x_coordinate' => rand(1, 200),
            'y_coordinate' => rand(1, 200),
            'velocity' => rand(0, 40)
        ];
    }
}
