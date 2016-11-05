<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscoState extends Model
{
    protected $fillable = [
        'disco_id',
        'state_id',
    ];
}
