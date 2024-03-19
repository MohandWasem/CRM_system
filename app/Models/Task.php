<?php

namespace App\Models;

use App\Models\User;
use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

     protected $fillable=[
        "operation_user_id","request_id",
   ];

    public function operationUser()
    {
        return $this->belongsTo(User::class, 'operation_user_id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class,'request_id');
    }
}
