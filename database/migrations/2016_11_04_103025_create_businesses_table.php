<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('owner_name');
            $table->tinyInteger('acceptInterCard');
            $table->string('street');
            $table->integer('region_id');
            $table->integer('state_id');
            $table->string('location');
            $table->integer('agent_id');
            $table->tinyInteger('approve_status');
            $table->integer('bank_id');
            $table->string('terminal_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('identifier');
            $table->string('comments');
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
        Schema::drop('businesses');
    }
}
