<?php

namespace App\Models;

use App\Models\Carrier;
use App\Models\Carrier_type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrier extends Model
{
    use HasFactory;

    protected $fillable=[
        "carrier_name","carrier_type_id","phone","address"
    ];

    public function types()
    {
        return $this->belongsTo(Carrier_type::class,"carrier_type_id","id");
    }
}
