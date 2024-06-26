<?php

namespace App\Http\Controllers\Admin;

use App\Models\client;
use App\Models\document;
use Illuminate\Http\Request;
use App\Models\Client_Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
   public function index()
   {
    $id=1;
    $Documents=document::with('client')->get();
     return view ("document.show",compact('id','Documents'));
   }

   public function shows()
   {
       $Client=client::get();
       return view("document.add",compact('Client'));
   }

   public function doc_insert(Request $request)
   {
      
         $request->validate([
            "file_name"=>"required",
            "file"=>"required"
         ]);
             if($request->has('file')){
            $file=$request->file('file');
            foreach ($file as  $file) {
              $extension=$file->getClientOriginalName();
              $filename=md5(uniqid()).".".$extension;
              $path='uploads/document/';
              $file->move($path, $filename);
            }
            document::create([
             "client_id"=>$request->input("client_id"),
             "file_name"=>$request->input("file_name"),
             "document_file"=>$path.$filename,
             ]);
            }
    
    
    
    return redirect()->route("document");
   }

   public function edit($id)
   {
      $Client=client::get();
      $Documents=document::findOrfail($id);
      return view('document.edit',compact('Client','Documents'));
   }

   public function update(Request $request , $id)
   {
      $Documents=document::findOrfail($id);
      $cat=document::where('id',$id)->first();

      $Documents->update([
         "client_id"=>$request->input("client_id"),
         "file_name"=>$request->input("file_name"),
      ]);

      if($request->hasfile('file')){
              if(File::exists($cat->document_file)){
                File::delete($cat->document_file);
              }
               $file=$request->file('file');
               foreach ($file as  $file) {
                      $extension=$file->getClientOriginalName();
                      $filename=md5(uniqid()).".".$extension;
                      $path='uploads/document/';
                      $file->move($path, $filename);
               $cat->document_file = $path.$filename ;
               $cat->save();
               }
            }
            return redirect()->route('document');
   }

   public function delete($id)
   {
      $client=document::where("id",$id)->get('document_file');
          foreach ($client as $cat) {
           
            if(File::exists($cat->document_file)){
              File::delete($cat->document_file);
            }
            $cat->delete();

          }

          $do=document::where('id',$id)->first();
          $do->delete();

       return redirect()->route('document');
   }
}
