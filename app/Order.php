<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function bill()
    {
        return $this->hasMany('App\Product','product_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    
}
