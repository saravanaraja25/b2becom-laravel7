<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function size()
    {
        return $this->belongsTo('App\TyreSize','tyre_size_id');
    }
}
