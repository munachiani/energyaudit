<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->truncate();

        $bank = [
            ['id' => 1, 'bank_name' => 'Access Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 2, 'bank_name' => 'CitiBank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 3, 'bank_name' => 'Diamond Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 4, 'bank_name' => 'Ecobank Nigeria','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 5, 'bank_name' => 'Fidelity Bank Nigeria','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 6, 'bank_name' => 'First City Monument Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 7, 'bank_name' => 'First Bank of Nigeria','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 8, 'bank_name' => 'Guaranty Trust Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 9, 'bank_name' => 'Heritage Bank Plc','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 10, 'bank_name' => 'Keystone Bank Limited','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 11, 'bank_name' => 'Providus Bank Plc','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 12, 'bank_name' => 'Skye Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 13, 'bank_name' => 'Stanbic IBTC Bank Nigeria','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 14, 'bank_name' => 'Standard Chartered Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 15, 'bank_name' => 'Sterling Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 16, 'bank_name' => 'Suntrust Bank Nigeria','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 17, 'bank_name' => 'Union Bank of Nigeria','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 18, 'bank_name' => 'United Bank for Africa','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 19, 'bank_name' => 'Unity Bank Plc','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 20, 'bank_name' => 'Wema Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 21, 'bank_name' => 'Zenith Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],
            ['id' => 22, 'bank_name' => 'Jaiz Bank','created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now()],

        ];

        DB::table('banks')->insert($bank);
    }
}
