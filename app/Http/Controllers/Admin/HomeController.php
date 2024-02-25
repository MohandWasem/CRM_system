<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\client;
use App\Models\activity;
use App\Models\document;
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
        $documents=document::where('client_id',$id)->get();
        return view ('admin.document',compact('documents'));
    }

    public function add()
    {
        $priv=User::all();
        $act=activity::all();
        return view('admin.add',compact('priv','act'));
    }

    public function info(Request $request)
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
         
          return redirect()->route('index')->with("success","Client has been added successfully");
    }

    public function edit($id)
    {
        $act=activity::all();
        $clients=client::findOrfail($id);
          return view("admin.edit",compact("clients","act"));
    }

    public function update(Request $req , $id)
    {
        $update=client::findOrFail($id);
      
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

