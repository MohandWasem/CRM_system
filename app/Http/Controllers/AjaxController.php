<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use App\Events\ReplayEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data if needed
        $validatedData = $request->validate([
            'request_id' => 'required',
            'price' => 'required|numeric', // Example validation rules, adjust as needed
        ]);

        // Store the replay data in the database or perform other actions as needed
        // Example: Saving data to the database
        $replay = new Replay();
        $replay->request_id = $request->input('request_id');
        $replay->price = $request->input('price');
        $replay->save();

        $data=[
            'request_id'=>$request->input('request_id'),
            'price'=>$request->input('price'),
            'free_time'=>$request->input('free_time'),
        ];

       event(new ReplayEvent($data));
        return response()->json(['message' => 'Replay stored successfully'], 200);
    }
}
