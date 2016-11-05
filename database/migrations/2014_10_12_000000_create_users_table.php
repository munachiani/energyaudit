<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LastName');
            $table->string('FirstName');
            $table->string('MiddleName');
            $table->string('Gender');
            $table->string('Address');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->string('UserName')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('ImageInfo');
            $table->string('PhoneNumber');
            $table->tinyInteger('PhoneNumberConfirmed')->default(0);
            $table->string('Email')->unique();
            $table->tinyInteger('EmailConfirmed')->default(0);
            $table->tinyInteger('TwoFactorEnabled')->default(0);
            $table->timestamp('LockoutEndDateUtc');
            $table->tinyInteger('LockoutEnabled')->default(0);
            $table->tinyInteger('AccessFailedCount')->default(0);
            $table->tinyInteger('IsActive');
            $table->string('created_by');
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
        Schema::drop('users');
    }
}
