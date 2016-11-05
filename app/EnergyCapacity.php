<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergyCapacity extends Model
{
    protected $fillable = [
        'generators',
        'inverters',
        'solar',
        'energy_audit_id',
    ];
}
