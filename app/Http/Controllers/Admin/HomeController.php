<?php

namespace App\Http\Controllers\Admin;

use App\Models\client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\clientRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $clients=client::all();
        return view("admin.admin",compact('clients'));
    }

    public function add()
    {
        return view('admin.add');
    }

    public function info(clientRequest $request)
    {
          client::create([
            "comapny_name"=>$request->input("companyname"),
            "contact_person"=>$request->input("contactperson"),
            "email"=>$request->input("email"),
            "telephone"=>$request->input("telephone"),
            "mobile"=>$request->input("mobile"),
            "notes"=>$request->input("message")
          ]);
          return redirect()->route('index')->with("success","Client has been added successfully");
    }

    public function edit($id)
    {
        $clients=client::findOrfail($id);
        return view("admin.edit",compact("clients"));
    }

    public function update(Request $req , $id)
    {
        client::where("id",$id)->update([
            "comapny_name"=>$req->input("companyname"),
            "contact_person"=>$req->input("contactperson"),
            "email"=>$req->input("email"),
            "telephone"=>$req->input("telephone"),
            "mobile"=>$req->input("mobile"),
            "notes"=>$req->input("message")
        ]);
        return redirect()->route('index');
    }

    public function delete($id)
    {
        client::where("id",$id)->delete();
        return redirect()->route("index");

    }



    public function logout()
    {
        Auth::guard("web")->logout();
        return redirect()->route("login");
    }
}

