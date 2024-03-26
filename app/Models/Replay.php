<?php

namespace App\Models;

use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Replay extends Model
{
    use HasFactory;
    protected $table='replays';
    protected  $fillable=[
        "request_id","price","free_time"
    ];

    public function request()
    {
        return $this->belongsTo(Request::class,"request_id");
    }
}
