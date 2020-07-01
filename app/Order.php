<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function bill()
    {
        return $this->hasMany('App\Bill','order_id','id');
    }
}
