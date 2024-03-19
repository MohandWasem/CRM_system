<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as LaravelRequest;

class TaskController extends Controller
{
  public function index()
  {
    $user=Auth::guard('web')->user()->user_role_id;
    $Requests=Request::where('approved',1)->with('salesUser','tasks','clients')->get();
     return view("RequestApproved.show",compact('Requests'));
  }
}
