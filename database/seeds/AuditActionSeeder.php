<?php

use Illuminate\Database\Seeder;

class AuditActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audit_actions')->truncate();
        $audits=[
            [1,'Login','Logged in'],
            [2,'Logout','Logged out'],
            [3,'Create User','Created User {UserName} with role: {Role}'],
            [4,'Update User','Edited User {UserName}'],
            [5,'Activate User','Activated User {UserName}'],
            [6,'Deactivate User','Deactivated User {UserName}'],
            [7,'Assign Region','Assigned {UserName} to region {Region}'],
            [8,'Assign Role','Added {UserName} to role: {Role}'],
            [9,'Delete User Region','Removed {UserName} from region: {Region}'],
            [10,'Remove user role','Removed {UserName} from role: {Role}'],
            [11,'PasswordReset','Reset Password']
        ];

        $audit=array();
        foreach ($audits as $item) {
            $audit[]=array('id'=>$item[0],'action_name'=>$item[1],'action_detail'=>$item[2],'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),);
        }

        DB::table('audit_actions')->insert($audit);
    }
}
