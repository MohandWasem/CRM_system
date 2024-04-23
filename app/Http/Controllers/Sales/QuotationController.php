<?php

namespace App\Http\Controllers\Sales;

use App\Models\Replay;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationController extends Controller
{
    public function index()
    {
        $Replays=Replay::get();
        $Quotations=Quotation::get();
        return view("quotation.show",compact('Replays','Quotations'));
    }

    public function edit($id)
    {
         $Replays=Replay::findOrFail($id);
         return view('quotation.add',compact('Replays'));
    }

    public function update(Request $request,$id)
    {

        Quotation::create([
            'request_id'=>$request->input('request_id'),
            'price'=>$request->input('price'),
            'free_time'=>$request->input('freeTime'),
            'notes'=>$request->input('notes'),
        ]);
        
        return redirect()->route('Quotations');
    }
}
