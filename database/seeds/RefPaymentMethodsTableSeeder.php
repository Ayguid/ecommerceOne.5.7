<?php

use Illuminate\Database\Seeder;

class RefPaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 2; $i++) {
        DB::table('ref_payment_methods')->insert([
           'payment_method_code' => rand(1, 2),
           'payment_method_description' => str_random(5),
       ]);
      }
    }
}
