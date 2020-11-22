<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderitems()
    {
        return $this->hasMany('App\OrderItem');
    }
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id');
    }
    public function address()
    {
        return $this->belongsTo('App\Address', 'address_id');
    }
}
