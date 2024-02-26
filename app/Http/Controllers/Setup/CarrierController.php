<?php

namespace App\Http\Controllers\Setup;

use App\Models\Carrier;
use App\Models\Carrier_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarrierController extends Controller
{
   public function index()
   {
      $carriers=Carrier::with("types")->get();
    return view("Carriers.show",compact("carriers"));
   }

   public function add()
   {
      $types=Carrier_type::get();
    return view("Carriers.add",compact("types"));
   }

   public function show(Request $request)
   {
      Carrier::create([
        "carrier_name"=>$request->input("carrier_name"),
        "carrier_type_id"=>$request->input("carrier_type_id"),
        "phone"=>$request->input("phone"),
        "address"=>$request->input("address"),
      ]);

      return redirect()->route("Carriers")->with("success","Carrier has been added successfully");
   }

   public function edit($id)
   {
        $carriers=Carrier::findOrfail($id);
        $types=Carrier_type::get();
      return view("Carriers.edit",compact("carriers","types"));
   }

   public function update(Request $request , $id)
   {
      $carriers=Carrier::findOrfail($id);
        $carriers->update([
         "carrier_name"=>$request->input("carrier_name"),
         "carrier_type_id"=>$request->input("carrier_type_id"),
         "phone"=>$request->input("phone"),
         "address"=>$request->input("address"),
        ]);

        return redirect()->route("Carriers");
   }

   public function delete($id)
   {
       $carriers=Carrier::where('id',$id)->delete();
      return redirect()->route("Carriers")->with("success","Successfully Delete Carriers");
   }
}
