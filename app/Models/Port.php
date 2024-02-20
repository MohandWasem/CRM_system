<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Request;
use App\Models\Port_Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Port extends Model
{
    use HasFactory;
    protected $fillable=[
         "Port_Name","Port_Type_Id","Port_Code","Port_Country","Port_Notes"
    ];



    public function Country()
    {
        return $this->belongsTo(Country::class,"Port_Country","id");
    }

    public function Port_Type()
    {
        return $this->belongsTo(Port_Type::class,"Port_Type_Id","id");
    }

    // public function requests()
    // {
    //     return $this->belongsTo(Request::class,"id","from_port");
    // }

    public function requests()
    {
        return $this->hasMany(Port::class,"id");
    }

    public function requests_1()
    {
        return $this->hasMany(Port::class,"to_port","id");
        
    }
}
