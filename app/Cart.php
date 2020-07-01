<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
 {
    // public function order()
    // {
    //     return $this->hasMany('App\Cart','product_id','user_id');
    // }
    public function getId()
    {
        $id=$this->id;
        return $id;
    }
    public function product()
    {
        return $this->hasMany("App\Product","id","product_id");
    }
    
    
}
