<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributionCompany extends Model
{
    protected $fillable = [
        'disco_name',
        'disco_address',
        'disco_info',
        'coverage_area',
    ];
}
