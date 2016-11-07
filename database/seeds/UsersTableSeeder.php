<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('user_roles')->truncate();


            $users = array(
                'id' => 1,
                'LastName' => 'MDA',
                'FirstName' => 'Admin',
                'MiddleName' => 'Super',
                'Gender' => 'MALE',
                'Address' => 'LAGOS, NIGERIA',
                'Latitude' => '6.455543',
                'Longitude' => '4.355544',
                'UserName' => 'admin@mdaudits.com',
                'password' => bcrypt('AdminPassword1.'),
                'ImageInfo' => '',
                'PhoneNumber' => '08068122576',
                'PhoneNumberConfirmed' => 1,
                'Email' => 'admin@mdaudits.com',
                'EmailConfirmed' => 1,
                'IsActive' => 1,
                'created_by' => 'Super Admin',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            );


        DB::table('users')->insert($users);
        DB::table('user_roles')->insert(array('userId'=>1,'roleId'=>6));
    }
}
