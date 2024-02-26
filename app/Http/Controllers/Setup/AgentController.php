<?php

namespace App\Http\Controllers\Setup;

use App\Models\Agent;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
         $agents=Agent::with("country")->get();
        return view("Agents.show",compact("agents"));
    }

    public function add()
    {
        $countries=Country::get();
        return view("Agents.add",compact("countries"));
    }

    public function show(Request $request)
    {
        Agent::create([
          "agent_name"=>$request->input("agent_name"),
          "contact_person"=>$request->input("contact_person"),
          "email"=>$request->input("email"),
          "telefon"=>$request->input("telephone"),
          "mobile"=>$request->input("mobile"),
          "address"=>$request->input("address"),
          "country_id"=>$request->input("country_id"),
        ]);

        return redirect()->route("Agents")->with("success","Agent has been added successfully");
    }

    public function edit($id)
    {
        $agents=Agent::findOrfail($id);
        $countries=Country::get();
        return view("Agents.edit",compact("agents","countries"));
    }

    public function update(Request $request , $id)
    {
        $agents=Agent::findOrfail($id);
            
        $agents->update([
            "agent_name"=>$request->input("agent_name"),
            "contact_person"=>$request->input("contact_person"),
            "email"=>$request->input("email"),
            "telefon"=>$request->input("telephone"),
            "mobile"=>$request->input("mobile"),
            "address"=>$request->input("address"),
            "country_id"=>$request->input("country_id"),
        ]);
        return redirect()->route("Agents");

    }

    public function delete($id)
    {
        $agents=Agent::where('id',$id)->delete();
        return redirect()->route("Agents")->with("success","Successfully Delete Agent");
    }
}
