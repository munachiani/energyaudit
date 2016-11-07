<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function dateRange($start,$end){
        $eg = DB::table('energy_audit_datas')->whereBetween('updated_at', array($start, $end))->get();
        return $eg === null ? '' : $eg;
    }

    public static function regionRange($state,$lga){
        $eg = DB::table('energy_audit_datas')
           ->whereRaw('state_id=? OR local_gov_id=?', array($state,$lga))
            ->get();
        return $eg === null ? '' : $eg;
    }
    public static function discoFilter($disco){
        $eg = DB::table('energy_audit_datas')
           ->whereRaw('disco_id=?', array($disco))
            ->get();
        return $eg === null ? '' : $eg;
    }
    public static function ministryFilter($ministryFilter){
        $eg = DB::table('energy_audit_datas')
           ->whereRaw('parent_fed_min_id=?', array($ministryFilter))
            ->get();
        return $eg === null ? '' : $eg;
    }
}
