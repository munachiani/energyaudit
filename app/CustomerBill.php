<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBill extends Model
{
    protected $fillable = [
        'customer_note_id', //Contains mda_name and mda_id
        'disco_id',
        'disco_acct_number',
        'acct_month',
        'invoice_number',
        'monthly_energy_consumption',
        'actual_estimated_billing',
        'meter_reading',
        'tariff_rate',
        'fixed_charge',
        'invoice_amt',
        'invoice_bill_attachment',
        'status',
    ];
}
