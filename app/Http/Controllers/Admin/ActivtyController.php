<?php

namespace App\Http\Controllers\Admin;

use App\Models\activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivtyController extends Controller
{
    public function activty()
    {
        $id=1;
        $activity=activity::all();
        return view("activity.show",compact('activity','id'));
    }

    public function add_act()
    {
        return view("activity.add");
    }

    public function insert_act(Request $req)
    {
        activity::create([
           "activity_name"=>$req->input("activity_name"),
        ]);

        return redirect()->route("activty")->with("erfolg","Activity has been added successfully");
    }
}
