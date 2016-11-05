<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * insert  into `department`(`id`,`dept_name`,`dept_info`,`dept_address`,`ministry_id`) values (1,'housing','provision of water','ikeja',1),(2,'land resource',NULL,'Oshodi',2),(3,'Administration',NULL,NULL,3),(4,'Higher Education',NULL,NULL,3),(5,'Technology and Science',NULL,NULL,3),(7,'Legal unit',NULL,NULL,2),(8,'Metallurgical and raw Material',NULL,NULL,2),(9,'Aluminum',NULL,NULL,2),(10,'Human Resource Management',NULL,NULL,1);
         *
         */

        DB::table('departments')->truncate();

        $departments = [
            [1, 'housing', 'provision of water', 'ikeja', 1],
            [2, 'land resource', NULL, 'Oshodi', 2],
            [3, 'Administration', NULL, NULL, 3],
            [4, 'Higher Education', NULL, NULL, 3],
            [5, 'Technology and Science', NULL, NULL, 3],
            [7, 'Legal unit', NULL, NULL, 2],
            [8, 'Metallurgical and raw Material', NULL, NULL, 2],
            [9, 'Aluminum', NULL, NULL, 2],
            [10, 'Human Resource Management', NULL, NULL, 1]
        ];

        $department=array();

        foreach($departments as $item){
            $department[]=array(
                'id'=>$item[0],
                'dept_name'=>$item[1],
                'dept_info'=>$item[2],
                'dept_address'=>$item[3],
                'ministry_id'=>$item[4],
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
            );
        }

        DB::table('departments')->insert($department);
    }
}
