<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergyAudit extends Model
{
    protected $fillable = [
        'building_name',
        'address',
        'sector_id',
        'amount_willing_to_pay',
        'period_id',
        'number_of_generator',
        'number_of_inverter',
        'number_of_solar',
        'backup_generator_size',
        'transformer_rating',
        'amount_of_additional_power_required',
        'avg_power_usage_per_month',
        'avg_gene_running_per_month',
        'amount_spent_on_fuel',
        'amount_of_energy_consumption_required',
        'auditor_id',
        'name_of_contact_person',
    ];
}
