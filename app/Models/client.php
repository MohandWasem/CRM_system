<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class client extends Model
{
    use HasFactory;
        
    protected $table= "clients";
    protected $fillable=[
      "comapny_name","contact_person","email","telephone","mobile","notes","coming_from","user_id"
      ,"status","activity"
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class,"id","user_id");
    }
}
