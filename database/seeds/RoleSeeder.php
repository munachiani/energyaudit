<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        
        $roles=[
            ['id'=>1,'name'=>'Disco','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['id'=>2,'name'=>'Field Agent','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['id'=>3,'name'=>'General Supervisor','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['id'=>4,'name'=>'Regional Admin','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['id'=>5,'name'=>'Regional Supervisor','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['id'=>6,'name'=>'Super Admin','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
        ];

        DB::table('roles')->insert($roles);
    }
}
