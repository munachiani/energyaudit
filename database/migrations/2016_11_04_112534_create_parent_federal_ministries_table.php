<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentFederalMinistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_federal_ministries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_fed_ministry_name');
            $table->string('parent_fed_ministry_addr');
            $table->string('parent_fed_ministry_info');
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
        Schema::drop('parent_federal_ministries');
    }
}
