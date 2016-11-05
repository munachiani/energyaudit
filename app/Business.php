<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'type',
        'owner_name',
        'acceptInterCard',
        'street',
        'region_id',
        'state_id',
        'location',
        'agent_id',
        'approve_status',
        'bank',
        'terminal_id',
        'latitude',
        'longitude',
        'identifier',
        'comments',
    ];
}
