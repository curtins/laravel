<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsheader extends Model
{
    protected $guarded = [];


    public function  newsdetail()
    {
        $this->hasMany('App\newsdetail' );
    }





}
