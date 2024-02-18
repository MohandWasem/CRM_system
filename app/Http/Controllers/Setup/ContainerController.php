<?php

namespace App\Http\Controllers\Setup;

use App\Models\Container;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContainerRequest;

class ContainerController extends Controller
{
    public function index()
    {
        $Containers=Container::get();
        return view('Containers.show',compact('Containers'));
    }

    public function add()
    {
        return view('Containers.add');

    }

    public function show(ContainerRequest $request)
    {
        Container::create([
            "container_type"=>$request->input("container_type"),
            "container_size"=>$request->input("container_size"),
          ]);

        return redirect()->route('Container')->with("success","Container has been added successfully");
    }

    public function edit($id)
    {
        $Containers=Container::findOrfail($id);
        return view("Containers.edit",compact("Containers"));
    }

    public function update(Request $request,$id)
    {
        $Containers=Container::findOrfail($id);
            
        $Containers->update([
            "container_type"=>$request->input("container_type"),
            "container_size"=>$request->input("container_size"),
        ]);

        return redirect()->route('Container');
    }

    public function delete($id)
    {
        $Containers=Container::where('id',$id)->delete();

           return redirect()->route('Container')->with("success","Successfully Delete Containers");

    }
}
