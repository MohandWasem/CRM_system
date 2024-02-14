<?php

namespace App\Http\Controllers\Setup;
use Illuminate\Http\Request as LaravelRequest;
use App\Models\Request;
use App\Models\Parameter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ParameterController extends Controller
{
    public function index()
    {
       $parameters=Parameter::all();
         return  view('Parameters.show',compact('parameters'));
    }

    public function add()
    {
        $req=Request::get();
        return view('Parameters.add',compact('req'));
    }

    public function edit($id)
    {
        $parameter=Parameter::findOrfail($id);
        return view('Parameters.edit',compact('parameter'));

    }

    public function update(LaravelRequest $req,$id)
    {
         
     $parameter=Parameter::findOrfail($id);

               // dd($req->all());
         $parameter->update([
            
            'last_id'=>$req->last_id,
         ]);
         return  redirect()->route('parameter');
    }

}
