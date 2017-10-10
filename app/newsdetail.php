<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsdetail extends Model
{
    protected $guarded = [];


    public function  newsheader()
    {
        return $this->hasOne('newsheader' );
    }

}
