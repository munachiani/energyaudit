<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDisco extends Model
{
    protected $fillable = [
        'user_id',
        'disco_id',
    ];
}
