<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
        'agency_name',
        'agency_info',
        'agency_address',
        'dept_id',
        'ministry_id',
    ];
}
