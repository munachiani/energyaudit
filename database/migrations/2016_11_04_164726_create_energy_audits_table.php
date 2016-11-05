<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergyAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_audits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('building_name');
            $table->string('address');
            $table->integer('sector_id');
            $table->double('amount_willing_to_pay');
            $table->integer('period_id');
            $table->integer('number_of_generator');
            $table->integer('number_of_inverter');
            $table->integer('number_of_solar');
            $table->string('backup_generator_size');
            $table->string('transformer_rating');
            $table->string('amount_of_additional_power_required');
            $table->string('avg_power_usage_per_month');
            $table->string('avg_gene_running_per_month');
            $table->string('amount_spent_on_fuel');
            $table->string('amount_of_energy_consumption_required');
            $table->string('auditor_id');
            $table->string('name_of_contact_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('energy_audits');
    }
}
