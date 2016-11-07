<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerBill extends Model
{
    protected $fillable = [
        'mda_name',
        'disco',
        'disco_account_number',
        'invoice_date',
        'account_month',
        'invoice_number',
        'monthly_energy_consumption',
        'meter_reading',
        'actual_estimated_billing',
        'tariff_rate',
        'fixed_charge',
        'invoice_amt',
        'invoice_bill_attachment',
    ];

    public static function dateRange($start,$end){
        $eg = DB::table('customer_bills')->whereBetween('updated_at', array($start, $end))->get();
        return $eg === null ? '' : $eg;
    }

    public static function discoFilter($disco){
        $eg = DB::table('customer_bills')
            ->whereRaw('disco=?', array($disco))
            ->get();
        return $eg === null ? '' : $eg;
    }

}
