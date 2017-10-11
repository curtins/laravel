<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $guarded = [];
    
    
    public function  Header()
    {
        return $this->belongsTo('App\Header');
    }
}
