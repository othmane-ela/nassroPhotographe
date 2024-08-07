<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['quantity'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }

    public function presentPrice()
    {
        return money_format('%i',$this->price / 100);
    }
}
