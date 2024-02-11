<?php

namespace App\Http\Controllers\Admin;

use App\Models\client;
use App\Models\document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
   public function index()
   {
    $id=1;
    $doc=document::all();

     $mo=client::with('documents')->get();
     return view ("document.show",compact('doc','id'));
   }

   public function shows()
   {
    return view("document.add");
   }

   public function doc_insert(Request $request)
   {
         $request->validate([
            "file_name"=>"required",
            "file"=>"mimes:pdf,jpeg,webp|required"
         ]);
         if($request->has('file')){
            $file=$request->file('file');
            $extension=$file->getClientOriginalName();
            $filename=md5(uniqid()).".".$extension;
            $path='uploads/document/';
            $file->move($path, $filename);
            document::create([
             "file_name"=>$request->input("file_name"),
             "document_file"=>$path.$filename,
             ]);
        }
    
    
    
    return redirect()->route("document");
   }
}
