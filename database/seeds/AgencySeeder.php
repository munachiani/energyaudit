<?php

use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * insert  into `agency`(`agency_id`,`agency_name`,`agency_info`,`agency_address`,`dept_id`,`ministry_id`) values (1,'Metallurgical Training institute',NULL,NULL,8,2),(2,'Ajaokuta Steel Company',NULL,NULL,9,2),(3,'National Examination Council',NULL,NULL,4,3),(4,'West African Examination Council',NULL,NULL,4,3),(5,'Council of regulation of Engineering ',NULL,NULL,10,1);
         */
        DB::table('agencies')->truncate();

        $agencies = [
            [1, 'Metallurgical Training institute', NULL, NULL, 8, 2],
            [2, 'Ajaokuta Steel Company', NULL, NULL, 9, 2],
            [3, 'National Examination Council', NULL, NULL, 4, 3],
            [4, 'West African Examination Council', NULL, NULL, 4, 3],
            [5, 'Council of regulation of Engineering ', NULL, NULL, 10, 1]
        ];

        $agency = array();
        foreach ($agencies as $item) {
            $agency[]=array(
                'id'=>$item[0],
                'agency_name'=>$item[1],
                'agency_info'=>$item[2],
                'agency_address'=>$item[3],
                'dept_id'=>$item[4],
                'ministry_id'=>$item[5],
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
                );
        }

        DB::table('agencies')->insert($agency);


    }
}
