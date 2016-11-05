<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'dept_name',
        'dept_info',
        'dept_address',
        'ministry_id',
    ];
}
