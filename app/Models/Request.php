<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable=[
        "request_id","client_name","shipment_direction","shipment_type",
    ];


    public function type()
    {
        return $this->belongsTo(Shipment_type::class ,"shipment_type","id");
    }

    
    protected $appends = ['serial_number'];

    public function getSerialNumberAttribute()
    {
        $shipmentDir = $this->shipment_direction? 'IM' : 'EX';
        $shipmentType = $this->type? $this->type->type : '';

        return $shipmentDir .'-'. $shipmentType .'-'. (24000 + $this->id);
    }
}
