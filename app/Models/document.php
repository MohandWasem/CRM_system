<?php

namespace App\Models;

use App\Models\client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class document extends Model
{
    use HasFactory;

    protected $fillable=["file_name","document_file","document_id",
];


public function client()
    {
        return $this->belongsTo(client::class,"id","document_id");
    }
}
