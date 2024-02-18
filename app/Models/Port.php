<?php

namespace App\Models;

use App\Models\Country;
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
}
