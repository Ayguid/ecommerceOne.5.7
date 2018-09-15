<?php

use Illuminate\Database\Seeder;

class RefAddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 2; $i++) {
        DB::table('ref_address_types')->insert([
           'address_type_code' => rand(1, 2),
           'address_type_description' => str_random(5),
       ]);
      }
    }
}
