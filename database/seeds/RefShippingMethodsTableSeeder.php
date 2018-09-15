<?php

use Illuminate\Database\Seeder;

class RefShippingMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 2; $i++) {
        DB::table('ref_shipping_methods')->insert([
           'shipping_method_code' => rand(1, 2),
           'shipping_method_description' => str_random(5),
           'shipping_charges' => rand(100, 1000),
       ]);
      }
    }
}
