<?php

namespace App\Http\Controllers\Operation;

use App\Models\Port;
use App\Models\Read;
use App\Models\Carrier;
use App\Models\Container;
use App\Models\Carrier_type;
use App\Models\Port_Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReadController extends Controller
{
   public function index()
   {
       $rates=Read::with("carrier","types","containers",'ports','ports_1',)->get();
      return view("Reads.show",compact("rates"));
   }

   public function add()
   {
    $carriers=Carrier::get();
    $carriers_types=Carrier_type::get();
    $container_type=Container::get();
    return view("Reads.add",compact("carriers","carriers_types","container_type"));
       
   }

   public function show(Request $request)
   {
    Read::create([
        "carrier_type_id"=>$request->input("carrier_type_id"),
        "radio_carrier_type"=>$request->input("radio_carrier_type"),
        "carrier_name_id"=>$request->input("carrier_name_id"),
        "pol"=>$request->input("search"),
        "pod"=>$request->input("search2"),
        "container_type_id"=>$request->input("container_type_id"),
        "weight"=>$request->input("weight"),
        "length"=>$request->input("length"),
        "weight_cm"=>$request->input("weight_cm"),
        "height"=>$request->input("height"),
        "price"=>$request->input("price"),
        "free_time"=>$request->input("free_time"),
        "transit_time"=>$request->input("transit_time"),
        "validitiy_date"=>$request->input("validitiy_date"),
        "notes"=>$request->input("notes"),
    ]);

    return redirect()->route('Rates')->with("success","Rates has been added successfully");
   }

   public function edit($id)
   {
        $rates=Read::findOrfail($id);
        $carriers=Carrier::get();
        $carriers_types=Carrier_type::get();
        $container_type=Container::get();
      return view("Reads.edit",compact("rates","carriers","carriers_types","container_type"));
   }

   public function update(Request $request , $id)
   {
     $rates=Read::findOrfail($id);

       $rates->update([
            "carrier_type_id"=>$request->input("carrier_type_id"),
            "radio_carrier_type"=>$request->input("radio_carrier_type"),
            "carrier_name_id"=>$request->input("carrier_name_id"),
            "pol"=>$request->input("search"),
            "pod"=>$request->input("search2"),
            "container_type_id"=>$request->input("container_type_id"),
            "weight"=>$request->input("weight"),
            "length"=>$request->input("length"),
            "weight_cm"=>$request->input("weight_cm"),
            "height"=>$request->input("height"),
            "price"=>$request->input("price"),
            "free_time"=>$request->input("free_time"),
            "transit_time"=>$request->input("transit_time"),
            "validitiy_date"=>$request->input("validitiy_date"),
            "notes"=>$request->input("notes"),
       ]);

          return redirect()->route('Rates');

   }

   public function delete($id)
   {
       $rates=Read::where('id',$id)->delete();

        return redirect()->route('Rates')->with("success","Successfully Delete Rates");

   }

   public function ports($type_id)
    {
       $shipment_type=Carrier_type::where('id',$type_id)->first();
       $port_type=Port_Type::where('Port_Type',$shipment_type->type)->first();
       $ports=[];
       if($port_type){

         $ports= Port::where("Port_Type_Id",$port_type->id)->get();
       }

       return response()->json(compact("ports","shipment_type","port_type"));
    }


    public function getAllCarriers($value)
    {
      $shipment_type=Carrier_type::where('id',$value)->first();
      $port_type=Carrier::where('carrier_name',$shipment_type->type)->first();
      $ports=[];
        $carriers = Carrier::all();

        return response()->json($carriers);
    }

    public function searchRates(Request $request)
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
