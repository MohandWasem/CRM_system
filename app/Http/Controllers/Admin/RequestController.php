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
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request as LaravelRequest;

class RequestController extends Controller
{
    public function index()
    {
         $Requests=Request::with('type','commodities','clients')->get();
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

        // if($request->has('file')){
        //     $file=$request->file('file');
        //     foreach ($file as  $file) {
        //       $extension=$file->getClientOriginalName();
        //       $filename=md5(uniqid()).".".$extension;
        //       $path='uploads/requestFile/';
        //       $file->move($path, $filename);
        //     }
        // }
        $id_user=Auth::guard('web')->user()->id;
        $req=Request::create([
              
              "client_name"=>$request->input("client_name"),
              "shipment_direction"=>$request->input("shipment_direction"),
              "radio_type"=>$request->input("radio_type"),
              "from_port"=>$request->input("search"),
              "to_port"=>$request->input("search2"),
              "serial_number"=>(int)$parameter->last_id,
              "shippingType"=>$request->input("shippingType"),
              "number_shippingType"=>$request->input("number_shippingType"),
              "weight_shippingType"=>$request->input("weight_shippingType"),
              "l_shippingType"=>$request->input("l_shippingType"),
              "wCM_shippingType"=>$request->input("wCM_shippingType"),
              "h_shippingType"=>$request->input("h_shippingType"),
              "cbm_shippingType"=>$request->input("cbm_shippingType"),
              "grossw_shippingType"=>$request->input("grossw_shippingType"),
              "quantity"=>$request->input("numberInput"),
              "container_id"=>$request->input("container_id"),
              "numberBoxe"=>$request->input("numberBoxes"),
              "weight"=>$request->input("weight"),
              "length"=>$request->input("length"),
              "weight_cm"=>$request->input("weight_cm"),
              "height"=>$request->input("height"),
              "vcweight"=>$request->input("vcweight"),
              "grossweight"=>$request->input("grossweight"),
              "checkCargo"=>$request->input("checkCargo"),
            //   "fileInput"=>$path.$filename,
              "commodity_id"=>$request->input("commodity_id"),
              "remarks"=>$request->input("remarks"),
              "sales_user_id"=>$id_user,
              "title"=>$request->input('title'),
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
        $cat=Request::where('id',$id)->first();

        if($request->hasfile('file')){
            if(File::exists($req->fileInput)){
              File::delete($req->fileInput);
            }
             $file=$request->file('file');
             $extension=$file->getClientOriginalName();
             $filename=md5(uniqid()).".".$extension;
             $path='uploads/requestFile/';
             $file->move($path, $filename);
              $req->fileInput = $path.$filename ;
              $req->save();
             
          }

        $req->update([
        "client_name"=>$request->input("client_name"),
        "shipment_direction"=>$request->input("shipment_direction"),
        "radio_type"=>$request->input("radio_type"),
        "from_port"=>$request->input("search"),
        "to_port"=>$request->input("search2"),
        "shippingType"=>$request->input("shippingType"),
        "number_shippingType"=>$request->input("number_shippingType"),
        "weight_shippingType"=>$request->input("weight_shippingType"),
        "l_shippingType"=>$request->input("l_shippingType"),
        "wCM_shippingType"=>$request->input("wCM_shippingType"),
        "h_shippingType"=>$request->input("h_shippingType"),
        "cbm_shippingType"=>$request->input("cbm_shippingType"),
        "grossw_shippingType"=>$request->input("grossw_shippingType"),
        "quantity"=>$request->input("numberInput"),
        "container_id"=>$request->input("container_id"),
        "numberBoxe"=>$request->input("numberBoxes"),
        "weight"=>$request->input("weight"),
        "length"=>$request->input("length"),
        "weight_cm"=>$request->input("weight_cm"),
        "height"=>$request->input("height"),
        "vcweight"=>$request->input("vcweight"),
        "grossweight"=>$request->input("grossweight"),
        "checkCargo"=>$request->input("checkCargo"),
        "commodity_id"=>$request->input("commodity_id"),
        "remarks"=>$request->input("remarks"),
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
        $shipping_type=$request['shipping_type'] ??'';

          $query=Port_Type::where('Port_Type',$request)->get();
         
              
        $results = Port::where('Port_Name', 'like', '%' . $keyWord . '%')->whereHas('Port_Type',function($query) use($shipping_type) {
            // $query->where('Port_Type', 'like', '%' . $shipping_type . '%');
              if($shipping_type == 'land'){
                  $query->whereIn('Port_Type',['sea','dry']);
                 }else if($shipping_type == 'courier'){
                  $query->whereIn('Port_Type',['air']);
                 }else{
                  $query->where('Port_Type', 'like', '%' . $shipping_type . '%');
                    }
            

        })->get();

        return response()->json($results);
    }
    
}
