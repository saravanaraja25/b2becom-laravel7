<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TyreSize extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function orderitems()
    {
        return $this->hasMany('App\OrderItems');
    }
}
