<?php

namespace App\Http\Controllers\Setup;

use App\Models\Country;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    public function index()
    {
         $suppliers=Supplier::with("Country")->get();
        return view('suppliers.show',compact('suppliers'));
    }

    public function add()
    {
        $countries=Country::get();
        return view('suppliers.add',compact('countries'));
    }

    public function show(Request $request)
    {
        if($request->has('file')){
            $file=$request->file('file');
            foreach ($file as  $file) {
              $extension=$file->getClientOriginalName();
              $filename=md5(uniqid()).".".$extension;
              $path='uploads/supplier_document/';
              $file->move($path, $filename);
            }
            Supplier::create([
             "name"=>$request->input("supplier_name"),
             "contact_person"=>$request->input("contact_person"),
             "email"=>$request->input("email"),
             "mobile"=>$request->input("mobile"),
             "phone"=>$request->input("phone"),
             "address"=>$request->input("address"),
             "type"=>$request->input("type"),
             "country_id"=>$request->input("country_id"),
             "document_file"=>$path.$filename,
             ]);

             return redirect()->route('suppliers')->with("success","Supplier has been added successfully");
            }
    }

    public function edit($id)
    {
         $suppliers=Supplier::findOrfail($id);
         $countries=Country::get();
        return view('suppliers.edit',compact('suppliers','countries'));
    }

    public function update(Request $request , $id)
    {
        $suppliers=Supplier::findOrfail($id);
        $cat=Supplier::where('id',$id)->first();

            
        $suppliers->update([
            "name"=>$request->input("supplier_name"),
            "contact_person"=>$request->input("contact_person"),
            "email"=>$request->input("email"),
            "mobile"=>$request->input("mobile"),
            "phone"=>$request->input("phone"),
            "address"=>$request->input("address"),
            "type"=>$request->input("type"),
            "country_id"=>$request->input("country_id"),
    
        ]);

        if($request->hasfile('file')){
            if(File::exists($cat->document_file)){
              File::delete($cat->document_file);
            }
             $file=$request->file('file');
             foreach ($file as  $file) {
                    $extension=$file->getClientOriginalName();
                    $filename=md5(uniqid()).".".$extension;
                    $path='uploads/supplier_document/';
                    $file->move($path, $filename);
              $cat->document_file = $path.$filename ;
              $cat->save();
             }
          }

          return redirect()->route('suppliers');
    }

    public function delete($id)
    {
        $suppliers=Supplier::where('id',$id)->delete();
        return redirect()->route('suppliers')->with("success","Successfully Delete Suppliers");
         
    }
}
