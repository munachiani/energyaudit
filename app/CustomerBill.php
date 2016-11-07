<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
