<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function size()
    {
        $this->belongsTo('App\TyreSize', 'foreign_key');
    }
}
