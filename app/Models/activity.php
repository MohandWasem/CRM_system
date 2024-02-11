<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;

    protected $fillable=["activity_name"];


    protected $appends = ['serial_activity'];

    public function getSerialActivityAttribute()
    {
        return $Serial_Activity= ('AC'.'-'. + $this->id);

    }

    
}
