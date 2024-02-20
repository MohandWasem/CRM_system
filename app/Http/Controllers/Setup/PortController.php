<?php

namespace App\Http\Controllers\Setup;

use App\Models\Port;
use App\Models\Country;
use App\Models\Port_Type;
use Illuminate\Http\Request;
use App\Http\Requests\PortRequest;
use App\Http\Controllers\Controller;

class PortController extends Controller
{
    public function index()
    {
         $Ports=Port::with('Country','Port_Type')->get();
         return view('Ports.show',compact('Ports'));
    }

    public function add()
    {
         $sea=Port::select('Port_Name','Port_Type_Id','Port_Code','Port_Country')->get();
        $Countries=Country::get();
        $Port_Types=Port_Type::get();
        return view('Ports.add',compact('Countries','Port_Types'));
    }

    public function show(PortRequest $request)
    {
         Port::create([
             "Port_Name"=>$request->input("Port_Name"),
             "Port_Type_Id"=>$request->input("Port_Type"),
             "Port_Code"=>$request->input("Port_Code"),
             "Port_Country"=>$request->input("Country_Name"),
             "Port_Notes"=>$request->input("Port_Notes"),
         ]);

         return redirect()->route('Ports')->with("success","Port has been added successfully");
    }

    public function edit($id)
    {
 
       $Ports=Port::findOrfail($id);
       $Countries=Country::get();
        $Port_Types=Port_Type::get();
       return view('Ports.edit',compact('Ports','Countries','Port_Types'));
    }

    public function update(Request $request,$id)
    {
       $Ports=Port::findOrfail($id);
             
       $Ports->update([
        "Port_Name"=>$request->input("Port_Name"),
        "Port_Type_Id"=>$request->input("Port_Type"),
        "Port_Code"=>$request->input("Port_Code"),
        "Port_Country"=>$request->input("Country_Name"),
        "Port_Notes"=>$request->input("Port_Notes"),
       ]);

       return redirect()->route('Ports');

    }

    public function delete($id)
    {
          $Ports=Port::where('id',$id)->delete();
          return redirect()->route('Ports')->with("success","Successfully Delete Ports");
    }
}
