<?php

namespace App\Models;

use App\Models\User;
use App\Models\document;
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
   
    public function users()
    {
        return $this->hasMany(User::class,"id","user_id");
    }

    public function documents()
    {
        return $this->hasMany(document::class,"client_id","id");
    }

    protected $appends = ['serial_client'];

    public function getSerialClientAttribute()
    {
        return $Serial_Client= ('CL'.'-'. + $this->id);

    }


}
