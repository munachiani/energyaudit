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
            $table->string('mda_name')->nullable();
            $table->string('disco')->nullable();
            $table->string('parent_ministry')->nullable();
            $table->string('disco_account_number')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('account_month')->nullable();
            $table->string('invoice_number')->nullable();
            $table->double('monthly_energy_consumption')->nullable();
            $table->double('meter_reading')->nullable();
            $table->string('actual_estimated_billing')->nullable();
            $table->double('tariff_rate')->nullable();
            $table->double('fixed_charge')->nullable();
            $table->double('invoice_amt')->nullable();
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
