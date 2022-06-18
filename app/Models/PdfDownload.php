<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfDownload extends Model
{
    use HasFactory;

    public function getItemTypeAttribute()
    { 
        
      return 'File';
        
    }

    protected $appends = ['item_type'];


}
