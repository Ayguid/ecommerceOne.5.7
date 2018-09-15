<?php

use Illuminate\Database\Seeder;

class UserAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('user_addresses')->insert([
           'user_id' => rand(1, 50),
           'premise_id' => rand(1, 50),
           'address_type_code' => rand(1, 2),
       ]);
      }
    }
}
