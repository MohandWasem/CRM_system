<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        return view("home");
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
