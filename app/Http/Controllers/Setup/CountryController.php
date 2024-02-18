<?php

namespace App\Http\Controllers\Setup;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
   public function index()
   {
    $Countries=Country::get();
    return view('Countries.show',compact('Countries'));
   }

   public function add()
   {
    return view('Countries.add');

   }

   public function show(CountryRequest $request)
   {
    Country::create([
            "Country_Name"=>$request->input("Country_Name"),
            "Country_Code"=>$request->input("Country_Code"),
    ]);

    return redirect()->route('Country')->with("success","Country has been added successfully");
   }

   public function edit($id)
   {
      $Countries=Country::findOrfail($id);

      return view('Countries.edit',compact('Countries'));
   }

   public function update(Request $request,$id)
   {
    $Countries=Country::findOrfail($id);
         
      $Countries->update([
        "Country_Name"=>$request->input("Country_Name"),
        "Country_Code"=>$request->input("Country_Code"),
      ]);
    return redirect()->route('Country');
        
   }

   public function delete($id)
   {
    $Countries=Country::where('id',$id)->delete();
    return redirect()->route('Country')->with("success","Successfully Delete Country");

   }

}
