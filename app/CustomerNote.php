<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function dateRange($start,$end){
        $eg = DB::table('customer_notes')->whereBetween('updated_at', array($start, $end))->get();
        return $eg === null ? '' : $eg;
    }

    public static function regionRange($state,$lga){
         if($lga=="")
        $eg = DB::table('customer_notes')
            ->whereRaw('state_id=?', array($state))
            ->get();
        else
            $eg = DB::table('customer_notes')
                ->whereRaw('state_id=? AND lga_id=?', array($state,$lga))
                ->get();

        return $eg === null ? '' : $eg;
    }
    public static function discoFilter($disco){
        $eg = DB::table('customer_notes')
            ->whereRaw('disco_id=?', array($disco))
            ->get();
        return $eg === null ? '' : $eg;
    }
    public static function ministryFilter($ministryFilter){
        $eg = DB::table('customer_notes')
            ->whereRaw('parent_fed_min_id=?', array($ministryFilter))
            ->get();
        return $eg === null ? '' : $eg;
    }
}
