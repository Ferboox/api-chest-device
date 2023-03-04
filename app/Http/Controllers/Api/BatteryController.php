<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Battery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatteryController extends Controller
{
    public function store(Request $request)
    {
        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'percentage' => 'required|numeric|gt:0|regex:/^\d+(\.\d{1,2})?$/',
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
            
            $battery = Battery::create([
                'percentage' => $request->percentage,
                'id_device' => $request->id_device
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data saved successfully',
                'data' =>  $battery,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
