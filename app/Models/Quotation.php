<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $fillable=[
        'request_id','price','free_time','notes'
    ];

    public function request()
    {
        return $this->belongsTo(Request::class,"request_id");
    }
}
