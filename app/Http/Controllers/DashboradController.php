<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as LaravelRequest;

class DashboradController extends Controller
{
    public function index()
    {
         $user=Auth::guard('web')->user()->user_role_id;
        // if ($user == 4 || $user==1 || $user==5 ) {}
         $Requests=Request::where('approved',0)->with('salesUser','tasks')->get();
            return view("Home.show",compact('Requests'));
    }

    public function approve($approve)
    {

        $order = Request::find($approve);
        $order->approved = true;
        $order->save();
      return redirect()->back()->with('success', 'Request approved successfully.');

        //  $id_user=Auth::guard('web')->user()->user_role_id;
        //   $Requests=Request::findOrfail($task);
        //   return $Requests->approved=null;

        // $task->operation_user_id = auth()->id();
        // $task->save();

        // // Optional: Remove other tasks associated with this request
        // // $task->request->tasks()->where('id', '!=', $task->id)->delete();

        //  redirect()->back()->with('success', 'Task approved successfully');

    }
}
