<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeedback extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
