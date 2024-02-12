<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\client;
use App\Models\activity;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\clientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $id=1;
        $clients=client::all();
        $info=client::get();
         return view("admin.admin",compact('clients','id','info'));
    }

    public function document($id)
    {
        $documents=Document::where('id',$id)->get("document_file");
        return view ('admin.document',compact('documents'));
    }

    public function add()
    {
        $priv=User::all();
        $act=activity::all();
        return view('admin.add',compact('priv','act'));
    }

    public function info(clientRequest $request)
    {
         $pro=client::create([
            "comapny_name"=>$request->input("companyname"),
            "contact_person"=>$request->input("contactperson"),
            "email"=>$request->input("email"),
            "telephone"=>$request->input("telephone"),
            "mobile"=>$request->input("mobile"),
            "notes"=>$request->input("notes"),
            "coming_from"=>$request->input("coming_from"),
            "user_id"=>$request->input("user_id"),
            "status"=>$request->input("status"),
            "activity"=>$request->input("activity_name"),
            
          ]);
          // if($request->has('file')){
          //   $file=$request->file('file');
          //   foreach ($file as  $file) {
          //     $extension=$file->getClientOriginalName();
          //     $filename=md5(uniqid()).".".$extension;
          //     $path='uploads/document/';
          //     $file->move($path, $filename);
          //      document::create([
          //      "document_id"=>$pro->id,
          //      "file_name"=>$request->input("file_name"),
          //      "document_file"=>$path.$filename,
          //      ]);
          //   }
          //   }
          return redirect()->route('index')->with("success","Client has been added successfully");
    }

    public function edit($id)
    {
        $act=activity::all();
        $clients=client::findOrfail($id);
        $data=document::where('document_id',$id)->get('file_name');
          return view("admin.edit",compact("clients","act","data"));
    }

    public function update(Request $req , $id)
    {
        $update=client::findOrFail($id);
         $cat=document::where('document_id',$id)->first();

         
         $update->update([
             "comapny_name"=>$req->input("companyname"),
             "contact_person"=>$req->input("contactperson"),
             "email"=>$req->input("email"),
             "telephone"=>$req->input("telephone"),
             "mobile"=>$req->input("mobile"),
             "notes"=>$req->input("notes"),
             "coming_from"=>$req->input("coming_from"),
             "user_id"=>$req->input("user_id"),
             "status"=>$req->input("status"),
             "activity"=>$req->input("activity_name"),
             
             
            ]);
            
            // if($req->hasfile('file')){
            //   if(File::exists($cat->document_file)){
            //     File::delete($cat->document_file);
            //   }
            //    $file=$req->file('file');
            //    $extension=$file->getClientOriginalName();
            //    $filename=md5(uniqid()).".".$extension;
            //    $path='uploads/document/';
            //    $file->move($path, $filename);
            //    $cat->file_name = $req->file_name ;
            //    $cat->document_file = $path.$filename ;
            //    $cat->save();

            // }

            return redirect()->route('index');
    }

    public function delete($id)
    {
      
       $client=client::where("id",$id)->with('documents')->first();
          foreach ($client->documents as $cat) {
           
            if(File::exists($cat->document_file)){
              File::delete($cat->document_file);
            }
            $cat->delete();

          }

          $client->delete();
      
      return redirect()->route("index");

    }



    public function logout()
    {
        Auth::guard("web")->logout();
        return redirect()->route("login");
    }
}

