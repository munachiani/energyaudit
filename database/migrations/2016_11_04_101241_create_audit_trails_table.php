<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actionId');
            $table->string('actorName');
            $table->string('actorUsername');
            $table->string('details');
            $table->string('ipAddress');
            $table->integer('stateId')->nullable();
            $table->string('userRole');
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
        Schema::drop('audit_trails');
    }
}
