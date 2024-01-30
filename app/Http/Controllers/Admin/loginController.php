<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view("admin.login");
    }

    public function data(Request $request)
    {
        if(Auth::guard('web')->attempt(["email"=>$request->input("email"),"password"=>$request->input("password")])){
            return redirect()->route("index");
           
            }else{ 
            
            return redirect()->route("login")->with("error"," Email or Password is incorrect.");
            }
    }
}
