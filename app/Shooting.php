<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shooting extends Model
{


    protected $fillable = [
        'user_id','nom','prenom','seance_date','email','phone','confirmer'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
