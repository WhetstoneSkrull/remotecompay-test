<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlLink extends Model
{
    use HasFactory;

    public function getItemTypeAttribute()
    { 
        
      return 'Url';
        
    }


    public function getOpenTypeAttribute()
    { 
        if ($this-> is_open_in_new_tab == true ) {
            return  '_blank';
        } else {
            return  '_self';
        }
        
        
      return 'Url';
        
    }

    protected $appends = ['item_type', 'open_type'];

}
