<?php

use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * insert  into `ministry`(`ministry_id`,`ministry_name`,`ministry_info`,`ministry_address`) values (1,'Ministry of Work'],(2,'Ministry of Mineral Resources'],(3,'Ministry of Education'];
         */

        DB::table('ministries')->truncate();
        $ministries=[
            [1,'Ministry of Work'],
            [2,'Ministry of Mineral Resources'],
            [3,'Ministry of Education']
        ];
        $ministry=array();
        foreach($ministries as $item){
            $ministry[]=array('id'=>$item[0],'ministry_name'=>$item[1],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),);
        }

        DB::table('ministries')->insert($ministry);
    }
}
