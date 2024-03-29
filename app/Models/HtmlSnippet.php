<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtmlSnippet extends Model
{
    use HasFactory;

    
    public function getItemTypeAttribute()
    { 
        
      return 'Snippet';
        
    }

    protected $appends = ['item_type'];
}
