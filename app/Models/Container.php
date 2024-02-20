<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable=[
            "container_type","container_size"
    ];


    public function getFullNameAttribute()
    {
      
        $size=$this->container_size . '-' . $this->container_type;
        return $size ;
    }
}
