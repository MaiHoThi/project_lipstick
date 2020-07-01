<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function cart()
    {
        return $this->hasMany('App\Cart','id','cart_id');
    }
    public function order()
    {
        return $this->hasMany('App\Order','order_id','id');
    }
}
