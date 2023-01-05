<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DeviceController extends Controller
{
    public function devices(Request $request)
    {

        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'limit' => 'required|integer|max:22|min:1'
            ]);

            // Return an error if doesn't detect a message at the request.
            if($validateMessage->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error en la validación',
                    'errors' => $validateMessage->errors()
                ], 401);
            }   

            $devices = Device::randomInformation($request->limit);

            return response()->json([
                'status' => true,
                'message' => 'Datos obtenidos correctamente',
                'data' =>  $devices,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }

    public function location(Request $request)
    {
        try{
            $location = Device::randomLocation($request->route('id'));

            return response()->json([
                'status' => true,
                'message' => 'Datos obtenidos correctamente',
                'data' =>  $location,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }

    public function multipleLocation(Request $request)
    {

        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'limit' => 'required|integer|max:22|min:1'
            ]);

            // Return an error if doesn't detect a message at the request.
            if($validateMessage->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error en la validación',
                    'errors' => $validateMessage->errors()
                ], 401);
            }   
            
            $data = [];

            for($i = 0; $i < $request->limit; $i++){
                array_push($data, Device::randomLocation($i));
            }

            return response()->json([
                'status' => true,
                'message' => 'Datos obtenidos correctamente',
                'data' =>  $data,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }

    public function battery(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Datos obtenidos correctamente',
            'data' =>  [
                "id_device" => $request->route('id'),
                'battery' => rand(0, 100) . '%' 
            ],
        ], 200);
    }
}
