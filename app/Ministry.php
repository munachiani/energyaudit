<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable = [
        'ministry_name',
        'ministry_info',
        'ministry_address',
    ];
}
