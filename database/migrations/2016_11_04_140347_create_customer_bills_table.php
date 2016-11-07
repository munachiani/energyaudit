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
            $table->string('mda_name');
            $table->string('disco');
            $table->string('disco_account_number');
            $table->string('invoice_date');
            $table->string('account_month');
            $table->string('invoice_number');
            $table->double('monthly_energy_consumption');
            $table->double('meter_reading');
            $table->string('actual_estimated_billing');
            $table->double('tariff_rate');
            $table->double('fixed_charge')->nullable();
            $table->double('invoice_amt');
            $table->string('invoice_bill_attachment')->nullable();
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
