<?php

namespace App\Models;

use App\Models\Port;
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
       ,"from_port","to_port","container_id","commodity_id"
    ];


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

    
    // protected $appends = ['serial_number'];

    public function getSerialNumberAttribute($value)
    {
        $shipmentDir = $this->shipment_direction? 'IM' : 'EX';
        $shipmentType = $this->type? $this->type->type : '';

        return $shipmentDir .'-'. $shipmentType .'-'. $value;
    }


}
