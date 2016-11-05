<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergyAuditData extends Model
{
    protected $fillable = [
        'state_id',
        'local_gov_id',
        'disco_id',
        'mda_name',
        'sector_id',
        'ministry_id',
        'dept_id',
        'agency_id',
        'parent_fed_min_id',
        'auditor_id',
        'avg_electricity_bill_per_month',
        'num_of_generators',
        'generator_running',
        'address',
        'num_of_years_at_location',
        'contact_of_mda_head',
        'telephone',
        'identifier',
        'comment',
        'latitude',
        'longitude',
        'building_identity',
        'image_path',
        'mda_level',
    ];
}
