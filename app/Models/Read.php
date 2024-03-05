<?php

namespace App\Models;

use App\Models\Port;
use App\Models\Carrier;
use App\Models\Carrier_type;
use App\Models\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Read extends Model
{
    use HasFactory;

    protected $fillable=[
        "carrier_name_id","carrier_type_id","radio_carrier_type","container_type_id"
        ,"weight","length","weight_cm","height","pol","pod"
        ,"price","free_time","transit_time","validitiy_date","notes"
    ];

    public function carrier()
    {
        return $this->belongsTo(Carrier::class ,"carrier_name_id","id");
    }

    public function types()
    {
        return $this->belongsTo(Carrier_type::class,"carrier_type_id","id");
    }
 
    public function containers()
    {
        return $this->belongsTo(Container::class ,"container_type_id","id");
    }

    public function ports()
    {
        return $this->belongsTo(Port::class,"pol","id");
        
    }

    public function ports_1()
    {
        return $this->belongsTo(Port::class,"pod","id");
        
    }
}
