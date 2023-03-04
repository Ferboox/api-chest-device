<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    public function store(Request $request)
    {
        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'time' => 'required|numeric|gt:0|regex:/^\d+(\.\d{1,2})?$/'
            ]);

            // Return an error if doesn't detect a message at the request.
            if($validateMessage->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error en la validación',
                    'errors' => $validateMessage->errors()
                ], 401);
            }   
            
            $time = Time::create([
                'seconds' => $request->time
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data saved successfully',
                'data' =>  $time,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
