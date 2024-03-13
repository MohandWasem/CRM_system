<?php

namespace App\Http\Controllers\Setup;

use App\Models\User;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $Admins=User::with('Roles')->get();
        return view("Users.show",compact('Admins'));
    }

    public function add()
    {
        $Roles=AdminRole::get();
        return view("Users.add",compact('Roles'));

    }

    public function show(Request $request)
    {
        User::create([
          "name"=>$request->input('name'),
          "email"=>$request->input('email'),
          "password"=>Hash::make($request->input('password')),
          "user_role_id"=>$request->input('user_role_id'),
        ]);

        return redirect()->route('Users')->with("success","User has been added successfully");
    }

    public function edit($id)
    {
        $Admins=User::findOrfail($id);
        $Roles=AdminRole::get();
        return view("Users.edit",compact('Roles','Admins'));

    }

    public function update(Request $request , $id)
    {
        $Admins=User::findOrfail($id);

        $Admins->update([
            "name"=>$request->input('name'),
            "email"=>$request->input('email'),
            "password"=>Hash::make($request->input('password')),
            "user_role_id"=>$request->input('user_role_id'),
        ]);

        return redirect()->route('Users');
    }

    public function delete($id)
    {
        $Admins=User::where('id',$id)->delete();

        return redirect()->route('Users')->with("success","Successfully Delete User");


    }
}
