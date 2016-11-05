<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acct_number');
            $table->integer('ministry_id')->nullable();
            $table->string('mda_name');
            $table->double('opening_balance');
            $table->double('bill_adjustment');
            $table->double('payment');
            $table->double('bill_amount');
            $table->double('closing_balance');
            $table->string('institution');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('disco_id');
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
        Schema::drop('account_infos');
    }
}
