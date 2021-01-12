<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MariageReservation extends Model
{
    protected $fillable = [
        'pack','user_id','nom','prenom','reservation_date','email','phone','confirmer'
    ];
}
