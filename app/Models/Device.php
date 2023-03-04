<?php

namespace App\Models;

use Carbon\Carbon;
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
            'velocity' => rand(0, 40),
            'timestamp' => Carbon::now()->toDateTimeString()
        ];
    }

    static public function getDistance($start, $end, $ids)
    {
        $distance_arr = [];

        // Calculate previously the distance by a command with start and end variables

        foreach($ids as $id){
            array_push($distance_arr, [
                "id" => $id,
                "distance" => rand(1, 3000)
            ]);
        }

        return $distance_arr;
    }


    static public function getCoordinates($id, $position_id)
    {
        return [
            'id_device' => $id,
            'position_id' => $position_id,
            'x_coordinate' => rand(1, 200),
            'y_coordinate' => rand(1, 200)
        ];
    }

    static public function getDimensions()
    {
        return [
            'x' => rand(1, 200),
            'y' => rand(1, 200)
        ];
    }
}
