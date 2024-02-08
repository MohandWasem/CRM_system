<?php

namespace App\Http\Controllers\Admin;

use App\Models\client;
use App\Models\Request;
use App\Models\Shipment_type;
use App\Http\Requests\rateRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $Request=Request::with('type')->get();
        return view('Request.show',compact('Request'));
    }

    public function show()
    {
        $client=client::all();
        $type=Shipment_type::all();
        return view('Request.add',compact("client","type"));
    }

    public function info(rateRequest $request)
    {
      
            
        $direction=$request->input("shipment_direction");
        $type_id=$request->input("shipment_type");

        Request::create([
              
              "client_name"=>$request->input("client_name"),
              "shipment_direction"=>$direction,
              "shipment_type"=>$type_id,
         ]);
           

        return   redirect()->route('request')->with("success","successfully Add Request");
    }



    public function edit($id)
    {
        $client=client::all();
        $type=Shipment_type::all();
        $request=Request::findOrfail($id);
        return view("Request.edit",compact('request','client','type'));
    }


    public function update(rateRequest $request ,$id)
    {
        
        $direction=$request->input("shipment_direction");
        $type_id=$request->input("shipment_type");
       
        

        $req=Request::findOrfail($id);
        $req->update([
        "client_name"=>$request->input("client_name"),
        "shipment_direction"=>$direction,
        "shipment_type"=>$type_id,
   ]);
     

  return   redirect()->route('request');

    }

    public function delete($id)
    {
        $or=Request::where("id",$id)->delete();
        return redirect()->route('request')->with("success","successfully delete Request");
    }

    
}
