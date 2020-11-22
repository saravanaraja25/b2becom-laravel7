<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function size()
    {
        return $this->belongsTo('App\TyreSize','tyre_size_id');
    }
    public function feedbacks()
    {
        return $this->hasMany('App\ProductFeedback');
    }
    public function orderitems()
    {
        return $this->hasMany('App\OrderItem');
    }
}
