<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use App\Models\Carrier;
use App\Models\Container;
use App\Models\Carrier_type;
use Illuminate\Http\Request;

class ReplayController extends Controller
{
   public function index()
   {
      $Replays=Replay::with('request')->get();
    return view("ReplayRequest.show",compact('Replays'));
   }
}
