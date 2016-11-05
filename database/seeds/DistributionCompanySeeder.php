<?php

use Illuminate\Database\Seeder;

class DistributionCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * insert  into `distributioncompany`(`disco_id`,`disco_name`,`disco_address`,`disco_info`,`coverage_area`) values (1,'Ikeja Distribution','Ikeja',NULL,'All of mainland, Ikeja to Badagry'),(2,'Ibadan Distribution','Ibadan',NULL,'Kwara, Ogun, Osun, Oyo'),(3,'Eko Distribution',NULL,NULL,'Island, VI, Lekki, Epe'),(4,'Enugu Distribution',NULL,NULL,'Abia, Anambra, Ebonyi, Enugu, Imo'),(5,'Port Harcourt Distribution',NULL,NULL,'Akwa-Ibom, Bayelsa, Cross River, Rivers'),(6,'Kano Distribution',NULL,NULL,'Jigawa, Kano, Katsina'),(7,'Kaduna Distribution',NULL,NULL,'Kaduna, Kebbi, Niger, Sokoto, Zamfara'),(8,'Yola Distribution',NULL,NULL,'Adamawa, Borno, Taraba, Yobe'),(9,'Abuja Distribution',NULL,NULL,'FCT, Kogi, Nassarawa, Niger'),(10,'Jos Distribution',NULL,NULL,'Bauchi, Benue, Gombe, Kogi, Plateau'),(11,'Benin Distribution',NULL,NULL,'Edo, Delta, Ondo, Ekiti');
         */

        DB::table('distribution_companies')->truncate();

        $discos = [
            [1, 'Ikeja Distribution', 'Ikeja', NULL, 'All of mainland, Ikeja to Badagry','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [2, 'Ibadan Distribution', 'Ibadan', NULL, 'Kwara, Ogun, Osun, Oyo','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [3, 'Eko Distribution', NULL, NULL, 'Island, VI, Lekki, Epe','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [4, 'Enugu Distribution', NULL, NULL, 'Abia, Anambra, Ebonyi, Enugu, Imo','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [5, 'Port Harcourt Distribution', NULL, NULL, 'Akwa-Ibom, Bayelsa, Cross River, Rivers','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [6, 'Kano Distribution', NULL, NULL, 'Jigawa, Kano, Katsina','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [7, 'Kaduna Distribution', NULL, NULL, 'Kaduna, Kebbi, Niger, Sokoto, Zamfara','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [8, 'Yola Distribution', NULL, NULL, 'Adamawa, Borno, Taraba, Yobe','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [9, 'Abuja Distribution', NULL, NULL, 'FCT, Kogi, Nassarawa, Niger','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [10, 'Jos Distribution', NULL, NULL, 'Bauchi, Benue, Gombe, Kogi, Plateau','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            [11, 'Benin Distribution', NULL, NULL, 'Edo, Delta, Ondo, Ekiti','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
        ];


        $disco = array();
        foreach($discos as $item){
            $disco[]=array(
                'id'=>$item[0],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),
                'disco_name'=>$item[1],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),
                'disco_address'=>$item[2],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),
                'disco_info'=>$item[3],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),
                'coverage_area'=>$item[4],'created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now(),
            );
        }
        DB::table('distribution_companies')->insert($disco);
    }
}
