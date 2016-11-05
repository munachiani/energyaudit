<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserClaim extends Model
{
    protected $fillable = [
        'UserId',
        'ClaimType',
        'ClaimValue',
    ];
}
