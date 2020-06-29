<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
   public function getId()
    {
        $id=$this->id;
        return $id;
    }
    function getPrice()
    {
        $price=number_format($this->price)."vnd";
        return $price;
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function carts()
    {
        return $this->belongsToMany("App\User","carts","product_id","user_id");
    }
    public function cart()
    {
        return $this->hasMany('App\Cart','id','product_id');
    }
}
