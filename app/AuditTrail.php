<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $fillable = [
        'actionId',
        'actorName',
        'actorUsername',
        'details',
        'ipAddress',
        'stateId',
        'userRole',
    ];
}
