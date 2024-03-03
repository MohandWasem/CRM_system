<?php

namespace App\Http\Controllers\Admin;

use App\Models\Port;
use App\Models\client;
use App\Models\Request;
use App\Models\Commodity;
use App\Models\Container;
use App\Models\Parameter;
use App\Models\Port_Type;
use App\Models\Shipment_type;
use App\Http\Requests\rateRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as LaravelRequest;

class RequestController extends Controller
{
    public function index()
    {
         $Requests=Request::with('type','commodities')->get();
        return  view('Request.show',compact('Requests'));
    }

    public function show()
    {
        $Commodities=Commodity::get();
        $Sizes= Container::get()->pluck('full_name','id');
        $client=client::all();
        $type=Shipment_type::all();
        return view('Request.add',compact("client","type","Sizes","Commodities"));
    }

    public function info(LaravelRequest $request)
    {
      //   request link parameter
        $parameter = Parameter::where('name','requests')->first(); 
        // $direction=$request->input("shipment_direction");
        // $type_id=$request->input("shipment_type");

        $req=Request::create([
              
              "client_name"=>$request->input("client_name"),
              "shipment_direction"=>$request->input("shipment_direction"),
              "shipment_type"=>$request->input("shipment_type"),
              "from_port"=>$request->input("search"),
              "to_port"=>$request->input("search2"),
              "serial_number"=>(int)$parameter->last_id,
              "container_id"=>$request->input("container_id"),
              "commodity_id"=>$request->input("commodity_id"),
         ]);
         $parameter->last_id=(int)$parameter->last_id + 1;
         $parameter->save();

        return   redirect()->route('request')->with("success","successfully Add Request");
    }



    public function edit($id)
    {
        $Ports=Port::get();
        $client=client::all();
        $type=Shipment_type::all();
        $Commodities=Commodity::get();
        $Sizes= Container::get()->pluck('full_name','id');
        $request=Request::findOrfail($id);
        return view("Request.edit",compact('request','client','type','Sizes','Ports','Commodities'));
    }


    public function update(LaravelRequest $request ,$id)
    {
        
        // $direction=$request->input("shipment_direction");
        // $type_id=$request->input("shipment_type");
       
        

        $req=Request::findOrfail($id);
        $req->update([
        "client_name"=>$request->input("client_name"),
        "shipment_direction"=>$request->input("shipment_direction"),
        "shipment_type"=>$request->input("shipment_type"),
        "from_port"=>$request->input("search"),
        "to_port"=>$request->input("search2"),
        "container_id"=>$request->input("container_id"),
        "commodity_id"=>$request->input("commodity_id"),
   ]);
     

     return redirect()->route('request');

    }

    public function delete($id)
    {
        $or=Request::where("id",$id)->delete();
        return redirect()->route('request')->with("success","Successfully Delete Request");
    }


    public function ports($type_id)
    {
       $shipment_type=Shipment_type::where('id',$type_id)->first();
       $port_type=Port_Type::where('Port_Type',$shipment_type->type)->first();
       $ports=[];
       if($port_type){

         $ports= Port::where("Port_Type_Id",$port_type->id)->get();
       }

       return response()->json(compact("ports","shipment_type","port_type"));
    }

    public function searchPorts(LaravelRequest $request)
    {
        // $query = $request->get('search');
        $keyWord = $request['search'] ??'';

        //   $query=Port_Type::where('Port_Type',$request)->get();
              
        $results = Port::whereHas('Port_Type',function($query) use($keyWord){
            $query->where('Port_Name', 'like', '%' . $keyWord . '%');
        })->get();

        return response()->json($results);
    }
    
}
