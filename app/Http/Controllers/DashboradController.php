<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\notification;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\DB;
use App\Models\Carrier;
use App\Models\Container;
use App\Models\Carrier_type;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as LaravelRequest;

class DashboradController extends Controller
{
    public function index()
    {
         $user=Auth::guard('web')->user()->user_role_id;
         $Requests=Request::where('approved',0)->with('salesUser','tasks','clients')->get();
         $carriers=Carrier::get();
         $carriers_types=Carrier_type::get();
         $container_type=Container::get();
            return view("Home.show",compact('Requests','carriers','carriers_types','container_type'));
    }

   
    public function approve($approve)
    {

        $order = Request::find($approve);
        $order->approved = true;
        $order->save();
      return redirect()->route('Request.Approved')->with('success', 'Request approved successfully.');

    }

    public function markNotificationAsRead($notifiable_id)
    {
    
     $user=auth()->user();
    $notification = $user->unreadNotifications()->update(['read_at' => now()]);
  
    return redirect()->route('home.dash');
   }

   public function show()
   {
      $carriers=Carrier::get();
      $carriers_types=Carrier_type::get();
      $container_type=Container::get();
      return view("model.show",compact("carriers","carriers_types","container_type"));
   }
}
