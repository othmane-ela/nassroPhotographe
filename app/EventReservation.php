<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    protected $fillable = [
        'pack','user_id','nom','prenom','reservation_date','email','phone','confirmer'
    ];
}
