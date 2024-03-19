<?php

namespace App\Models;

use App\Models\Port;
use App\Models\Task;
use App\Models\User;
use App\Models\Commodity;
use App\Models\Container;
use App\Models\Parameter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;

    protected $fillable=[
       "client_name","shipment_direction","radio_type" , "serial_number"
       ,"from_port","to_port","shippingType","number_shippingType","weight_shippingType","l_shippingType"
       ,"wCM_shippingType","h_shippingType","cbm_shippingType","grossw_shippingType"
       ,"quantity","container_id","numberBoxe","weight","length","weight_cm"
       ,"height", "vcweight","grossweight","checkCargo","fileInput","commodity_id","remarks","sales_user_id"
       ,"title","approved"
    ];

    public function clients()
    {
        return $this->belongsTo(client::class ,"client_name","id");
    }
  

    public function type()
    {
        return $this->belongsTo(Shipment_type::class ,"shipment_type","id");
    }

    public function parameter()
    {
        return $this->hasOne(Parameter::class,"id","last_id");
    }
     
    public function containers()
    {
        return $this->belongsTo(Container::class ,"container_id","id");
    }
   
    public function ports()
    {
        return $this->belongsTo(Port::class,"from_port","id");
        
    }

    public function ports_1()
    {
        return $this->belongsTo(Port::class,"to_port","id");
        
    }

    public function commodities()
    {
        return $this->belongsTo(Commodity::class,"commodity_id","id");
    }

    public function salesUser()
    {
        return $this->belongsTo(User::class, 'sales_user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    
    // protected $appends = ['serial_number'];

    public function getSerialNumberAttribute($value)
    {
        $shipmentDir = $this->shipment_direction? 'IM' : 'EX';
        $shipmentType = $this->radio_type? $this->radio_type : '';

        return $shipmentDir .'-'. $shipmentType .'-'. $value;
    }


}
