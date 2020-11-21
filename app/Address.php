<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    protected $guard = 'admin';
    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
