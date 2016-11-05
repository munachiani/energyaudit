<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerNote extends Model
{
    protected $fillable = [
        'mda_name',
        'government_level',
        'site_address',
        'site_latitude',
        'site_longitude',
        'closet_landmark',
        'city',
        'sector_id',
        'lga_id', //REFERS TO Region
        'state_id',
        'parent_fed_min_id',
        'disco_id',
        'business_unit_id',
        'disco_acct_number',
        'customer_type_id',
        'business_unit',
        'customer_type',
        'customer_class',
        'meter_installed',
        'meter_no',
        'meter_type',
        'meter_brand',
        'meter_model',
        'mda_name_id',
        'customer_class_id',
        'town',
        'village',
        'status',
    ];
}
