<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnergyAuditDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_audit_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->integer('local_gov_id');
            $table->integer('disco_id');
            $table->integer('mda_name');
            $table->integer('sector_id');
            $table->integer('ministry_id');
            $table->integer('dept_id');
            $table->integer('agency_id');
            $table->integer('parent_fed_min_id');
            $table->string('auditor_id');
            $table->integer('avg_electricity_bill_per_month');
            $table->integer('num_of_generators');
            $table->string('generator_running');
            $table->string('address');
            $table->string('num_of_years_at_location');
            $table->string('contact_of_mda_head');
            $table->string('telephone');
            $table->string('identifier');
            $table->string('comment');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('building_identity');
            $table->string('image_path');
            $table->string('mda_level');
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
        Schema::drop('energy_audit_datas');
    }
}
