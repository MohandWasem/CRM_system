<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable=[
     "name","contact_person","email","mobile","phone"
     ,"address","type","country_id","document_file",
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class,"country_id","id");
    }
}
