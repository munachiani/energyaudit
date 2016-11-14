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

            $table->string('mda_name')->nullable();
            $table->string('government_level')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_latitude')->nullable();
            $table->string('site_longitude')->nullable();
            $table->string('closet_landmark')->nullable();
            $table->string('city')->nullable();
            $table->string('sector_id')->nullable();
            $table->string('lga_id')->nullable(); //REFERS TO Region
            $table->string('state_id')->nullable();
            $table->string('parent_fed_min_id')->nullable();
            $table->string('disco_id')->nullable();
            $table->integer('business_unit_id')->nullable();
            $table->string('disco_acct_number')->nullable();
            $table->integer('customer_type_id')->nullable();
            $table->string('business_unit')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('customer_class')->nullable();
            $table->string('meter_installed')->nullable();
            $table->string('meter_no')->nullable();
            $table->string('meter_type')->nullable();
            $table->string('meter_brand')->nullable();
            $table->string('meter_model')->nullable();
            $table->integer('mda_name_id')->nullable();
            $table->string('customer_class_id')->nullable();
            $table->string('town')->nullable();
            $table->string('village')->nullable();
            $table->integer('status')->nullable();


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
