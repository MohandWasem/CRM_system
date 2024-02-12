<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;
    protected $fillable=[ "client_name","file_name","document_file",
];

  public function client()
    {
        return $this->belongsTo(client::class,"id","client_name");
    }

    protected $appends = ['serial_document'];
    
    public function getSerialDocumentAttribute()
    {
        return $Serial_Document= ('DOC'.'-'. + $this->id);
    }
    
}
