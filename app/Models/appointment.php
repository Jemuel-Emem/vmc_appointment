<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    //

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'date_of_appointment',
        'time',
        'request_type',
        'status'
    ];

}
