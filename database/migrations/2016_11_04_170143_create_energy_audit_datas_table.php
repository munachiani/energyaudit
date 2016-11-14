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
            $table->string('state_id')->nullable();
            $table->string('local_gov_id')->nullable();
            $table->string('disco_id')->nullable();
            $table->string('mda_name')->nullable();
            $table->integer('sector_id')->nullable();
            $table->integer('ministry_id')->nullable();
            $table->integer('dept_id')->nullable();
            $table->integer('agency_id')->nullable();
            $table->string('parent_fed_min_id')->nullable();
            $table->string('auditor_id')->nullable();
            $table->double('avg_electricity_bill_per_month')->nullable();
            $table->integer('num_of_generators')->nullable();
            $table->integer('generator_running')->nullable();
            $table->string('address')->nullable();
            $table->integer('num_of_years_at_location')->nullable();
            $table->string('contact_of_mda_head')->nullable();
            $table->string('telephone')->nullable();
            $table->string('identifier')->nullable();
            $table->string('comment')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('building_identity')->nullable();
            $table->string('image_path')->nullable();
            $table->string('mda_level')->nullable();
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
