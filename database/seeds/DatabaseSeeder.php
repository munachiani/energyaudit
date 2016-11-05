<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(BankSeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(AuditActionSeeder::class);
         $this->call(MinistrySeeder::class);
         $this->call(DepartmentSeeder::class);
         $this->call(AgencySeeder::class);
         $this->call(StateSeeder::class);
         $this->call(DistributionCompanySeeder::class);
         $this->call(DiscoCustomerClassSeeder::class);
         $this->call(DiscoStateSeeder::class);
         $this->call(ParentFederalMinistrySeeder::class);
         $this->call(RegionSeeder::class);
         $this->call(SectorSeeder::class);
    }
}
