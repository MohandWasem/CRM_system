<?php

namespace App\Http\Controllers\Setup;

use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommodityController extends Controller
{
    public function index()
    {
        $Commodities=Commodity::get();
        return view("Commodities.show",compact('Commodities'));
    }

    public function add()
    {
        return view("Commodities.add");

    }

    public function show(Request $request)
    {
        Commodity::create([
           "commodity_name"=>$request->input("commodity_name"),
        ]);

        return redirect()->route('Commodity')->with("success","Commodity has been added successfully");
    }

    public function edit($id)
    {
        $Commodities=Commodity::findOrfail($id);

        return view("Commodities.edit",compact('Commodities'));
    }

    public function update(Request $request ,$id)
    {
        $Commodities=Commodity::findOrfail($id);
            
        $Commodities->update([
           "commodity_name"=>$request->input("commodity_name"),
        ]);

        return redirect()->route('Commodity');
    }

    public function delete($id)
    {
        $Commodities=Commodity::where('id',$id)->delete();
 
        return redirect()->route('Commodity')->with("success","Successfully Delete Commodity");
    }
}
