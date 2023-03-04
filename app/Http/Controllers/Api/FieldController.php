<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\Field;

class FieldController extends Controller
{
    public function store(Request $request)
    {
        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'height' => 'required|numeric|gt:0|regex:/^\d+(\.\d{1,2})?$/',
                'width' => 'required|numeric|gt:0|regex:/^\d+(\.\d{1,2})?$/',
                'name' => 'required|string|max:25'
            ]);

            // Return an error if doesn't detect a message at the request.
            if($validateMessage->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error en la validación',
                    'errors' => $validateMessage->errors()
                ], 401);
            }   
            
            $field = Field::create([
                'height' => $request->height,
                'width' => $request->width,
                "name" => $request->name
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data saved successfully',
                'data' =>  $field,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
