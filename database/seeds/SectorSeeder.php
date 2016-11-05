<?php

use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * insert  into `sector`(`sector_id`,`sector_name`) values (1,'Banking'),(2,'Health'),(3,'Retails'),(4,'Telcoms'),(5,'Manufacturing');
         */

        DB::table('sectors')->truncate();
        $sectors=[
            [1,'Banking'],[2,'Health'],[3,'Retails'],[4,'Telcoms'],[5,'Manufacturing']
        ];
        $sector=array();
        foreach($sectors as $item){
            $sector[]=array('id'=>$item[0],'sector_name'=>$item[1],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),);
        }

        DB::table('sectors')->insert($sector);
    }
}
