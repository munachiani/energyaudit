<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_note_id'); //Contains mda_name and mda_id
//            $table->string('mda_name');
//            $table->integer('mda_id');
            $table->integer('disco_id');
            $table->string('disco_acct_number');
            $table->date('acct_month');
            $table->string('invoice_number');
            $table->string('monthly_energy_consumption');
            $table->string('actual_estimated_billing');
            $table->double('meter_reading');
            $table->double('tariff_rate');
            $table->double('fixed_charge');
            $table->double('invoice_amt');
            $table->string('invoice_bill_attachment');
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
        Schema::drop('customer_bills');
    }
}
