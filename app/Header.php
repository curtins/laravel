<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $guarded = [];
    
    
        public function  Detail()
        {
            return $this->hasMany('App\Detail');   
        }
}
