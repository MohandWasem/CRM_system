<?php

namespace App\Models;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;

    protected $fillable=[
       "client_name","shipment_direction","shipment_type", "serial_number"
    ];


    public function type()
    {
        return $this->belongsTo(Shipment_type::class ,"shipment_type","id");
    }

    public function parameter()
    {
        return $this->hasOne(Parameter::class,"id","last_id");
    }

    
    // protected $appends = ['serial_number'];

    public function getSerialNumberAttribute($value)
    {
        $shipmentDir = $this->shipment_direction? 'IM' : 'EX';
        $shipmentType = $this->type? $this->type->type : '';

        return $shipmentDir .'-'. $shipmentType .'-'. $value;
    }


}
