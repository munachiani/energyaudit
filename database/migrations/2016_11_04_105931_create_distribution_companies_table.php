<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disco_name');
            $table->string('disco_address');
            $table->string('disco_info');
            $table->string('coverage_area');
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
        Schema::drop('distribution_companies');
    }
}
