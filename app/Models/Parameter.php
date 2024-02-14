<?php

namespace App\Models;

use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','last_id'
    ];


    public function request()
    {
        return $this->belongsTo(Request::class,"last_id","id");
    }
    
}
