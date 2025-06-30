<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
