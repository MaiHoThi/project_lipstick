<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
 {
//     public function product()
//     {
//         return $this->hasMany('App\Product','product_id','user_id');
//     }
    public function product()
    {
        return $this->hasMany("App\Cart","product_id","id");
    }
    
    
}
