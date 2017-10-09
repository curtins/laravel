<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsdetail extends Model
{
    protected $guarded = [];


    public function  newsdetail()
    {
        return $this-belongsTo('App\newsheader' );
    }

}
