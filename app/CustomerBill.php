<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\CustomerNote;

class CustomerBill extends Model
{
    protected $fillable = [
        'mda_name',
        'disco',
        'parent_ministry',
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
    public static function distinctBill(){
        $array = [];
        $eg = DB::table('customer_bills')->distinct()->get();
        foreach($eg as $item){
            if(!in_array($item->parent_ministry,$array)){
                $array[]=$item->parent_ministry;
            }
        }
        return $array;
    }

    public function customerNote(){
        return $this->belongsTo('\App\CustomerNote','disco_account_number','disco_acct_number');
    }
}
