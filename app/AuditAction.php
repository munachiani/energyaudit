<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditAction extends Model
{
    protected $fillable=
        [
            'action_name',
            'action_detail'
        ];
}
