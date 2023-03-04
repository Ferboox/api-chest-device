<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Coordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoordinateController extends Controller
{
    public function store(Request $request)
    {
        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'x' => 'required|numeric',
                'y' => 'required|numeric',
                'id_device' => 'required|numeric|gt:0'
            ]);

            // Return an error if doesn't detect a message at the request.
            if($validateMessage->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error en la validación',
                    'errors' => $validateMessage->errors()
                ], 401);
            }   
            
            $coordinate = Coordinate::create([
                'x' => $request->x,
                'y' => $request->y,
                'id_device' => $request->id_device
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data saved successfully',
                'data' =>  $coordinate,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
