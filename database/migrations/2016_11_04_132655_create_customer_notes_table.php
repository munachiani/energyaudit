<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_notes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('mda_name');
            $table->string('government_level');
            $table->string('site_address');
            $table->string('site_latitude');
            $table->string('site_longitude');
            $table->string('closet_landmark');
            $table->string('city');
            $table->string('sector_id');
            $table->string('lga_id'); //REFERS TO Region
            $table->string('state_id');
            $table->string('parent_fed_min_id');
            $table->string('disco_id');
            $table->integer('business_unit_id');
            $table->string('disco_acct_number');
            $table->integer('customer_type_id');
            $table->string('business_unit');
            $table->string('customer_type');
            $table->string('customer_class');
            $table->string('meter_installed');
            $table->string('meter_no');
            $table->string('meter_type');
            $table->string('meter_brand');
            $table->string('meter_model');
            $table->integer('mda_name_id');
            $table->string('customer_class_id');
            $table->string('town');
            $table->string('village');
            $table->integer('status');


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
        Schema::drop('customer_notes');
    }
}
