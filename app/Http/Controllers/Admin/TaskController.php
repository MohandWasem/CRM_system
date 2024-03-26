<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\Task;
use App\Models\Replay;
use App\Models\Carrier;
use App\Models\Request;
use App\Models\Container;
use App\Models\Carrier_type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as LaravelRequest;

class TaskController extends Controller
{
  public function index()
  {
    $user=Auth::guard('web')->user()->user_role_id;
    $Requests=Request::where('approved',1)->with('salesUser','tasks','clients')->get();
    $carriers=Carrier::get();
    $carriers_types=Carrier_type::get();
    $container_type=Container::get();
    $request=Request::get();
     return view("RequestApproved.show",compact('Requests','carriers','carriers_types','container_type','request'));
  }

  
  public function store(LaravelRequest $request)
  {
    // Log::info('Incoming request data:', $request->all());
      $request->validate([
          'request_id' => 'required|exists:requests,id',
          'price' => 'required|numeric',
          'price' => 'required',
      ]);
  
      Replay::create([
          'request_id' => $request->input('request_id'),
          'price' => $request->input('price'),
          'free_time' => $request->input('freeTime'),
      ]);
  
      return response()->json(['success' => true]);
  }
}
