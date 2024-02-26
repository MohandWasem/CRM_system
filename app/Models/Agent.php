<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory;

    protected $fillable=[
         "agent_name","contact_person","email","telefon"
         ,"mobile","address","country_id"
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class,"country_id","id");
    }
}
