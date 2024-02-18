<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;
    protected $fillable=[
         "Port_Name","Port_Type","Port_Code","Port_Country","Port_Notes"
    ];
}
