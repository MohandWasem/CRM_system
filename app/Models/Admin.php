<?php

namespace App\Models;

use App\Models\AdminRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable=[
          "name","email","password","user_role_id"
    ];

    public function Roles()
    {
        return $this->belongsTo(AdminRole::class ,"user_role_id","id");
    }
}
