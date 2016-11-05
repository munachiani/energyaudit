<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountInfo extends Model
{
    protected $fillable =
        [
            'acct_number',
            'ministry_id',
            'mda_name',
            'opening_balance',
            'bill_adjustment',
            'payment',
            'bill_amount',
            'closing_balance',
            'institution',
            'address',
            'latitude',
            'longitude',
            'disco_id',
        ];
}
