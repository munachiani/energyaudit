<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegion extends Model
{
    protected $fillable = [
        'user_id',
        'region_id',
    ];
}
