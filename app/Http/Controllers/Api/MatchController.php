<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    public function store(Request $request)
    {
        try{
            //Validated
            $validateMessage = Validator::make($request->all(), 
            [
                'start' => 'required|date_format:Y-m-d H:i:s|after_or_equal:' . date(DATE_ATOM),
                'end' => 'required|date_format:Y-m-d H:i:s|after:start'
            ]);

            // Return an error if doesn't detect a message at the request.
            if($validateMessage->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error en la validación',
                    'errors' => $validateMessage->errors()
                ], 401);
            }   
            
            $match = Game::create([
                'start' => $request->start,
                'end' => $request->end
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data saved successfully',
                'data' =>  $match,
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
