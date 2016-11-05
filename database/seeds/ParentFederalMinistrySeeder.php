<?php

use Illuminate\Database\Seeder;

class ParentFederalMinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * insert  into `parentfederalministry`(`id`,`parent_fed_ministry_name`,`parent_fed_ministry_addr`,`parent_fed_ministry_info`) values (82,'Minister of Labour & Employment',NULL,NULL),(83,'Minister of Solid Minerals',NULL,NULL),(84,'Minister of Transportation',NULL,NULL),(85,'Minister of Power, Works and Housing',NULL,NULL),(86,'Minister of Interior',NULL,NULL),(87,'Minister of Women Affairs',NULL,NULL),(88,'Minister of Science and Technology',NULL,NULL),(89,'Minister of Finance',NULL,NULL),(90,'Minister of Justice & Attorney-General',NULL,NULL),(91,'Minister of State, Aviation',NULL,NULL),(92,'Minister of Communication',NULL,NULL),(93,'Minister of Water Resources',NULL,NULL),(94,'Minister for Youth and Sports',NULL,NULL),(95,'Minister of Agriculture',NULL,NULL),(96,'Minister of Budget & National Planning',NULL,NULL),(97,'Minister of Information',NULL,NULL),(98,'Minister of Environment',NULL,NULL),(99,'Minister of Foreign Affairs',NULL,NULL),(100,'Minister of Defence',NULL,NULL),(101,'Minister of Trade, Investment & Industry',NULL,NULL),(102,'Minister of Federal Capital Territory',NULL,NULL),(103,'Minister of Education',NULL,NULL),(104,'Minister of Health',NULL,NULL),(105,'Minister of Niger Delta',NULL,NULL),(106,'Minister of Petroleum',NULL,NULL);
         */

        DB::table('parent_federal_ministries')->truncate();
        $ministries=[
            [82,'Minister of Labour & Employment',NULL,NULL],[83,'Minister of Solid Minerals',NULL,NULL],[84,'Minister of Transportation',NULL,NULL],[85,'Minister of Power, Works and Housing',NULL,NULL],[86,'Minister of Interior',NULL,NULL],[87,'Minister of Women Affairs',NULL,NULL],[88,'Minister of Science and Technology',NULL,NULL],[89,'Minister of Finance',NULL,NULL],[90,'Minister of Justice & Attorney-General',NULL,NULL],[91,'Minister of State, Aviation',NULL,NULL],[92,'Minister of Communication',NULL,NULL],[93,'Minister of Water Resources',NULL,NULL],[94,'Minister for Youth and Sports',NULL,NULL],[95,'Minister of Agriculture',NULL,NULL],[96,'Minister of Budget & National Planning',NULL,NULL],[97,'Minister of Information',NULL,NULL],[98,'Minister of Environment',NULL,NULL],[99,'Minister of Foreign Affairs',NULL,NULL],[100,'Minister of Defence',NULL,NULL],[101,'Minister of Trade, Investment & Industry',NULL,NULL],[102,'Minister of Federal Capital Territory',NULL,NULL],[103,'Minister of Education',NULL,NULL],[104,'Minister of Health',NULL,NULL],[105,'Minister of Niger Delta',NULL,NULL],[106,'Minister of Petroleum',NULL,NULL]
        ];
        $ministry=array();
        foreach($ministries as $item){
            $ministry[]=array('id'=>$item[0],'parent_fed_ministry_name'=>$item[1],'parent_fed_ministry_addr'=>$item[2],'parent_fed_ministry_info'=>$item[3],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),);
        }

        DB::table('parent_federal_ministries')->insert($ministry);
    }
}
