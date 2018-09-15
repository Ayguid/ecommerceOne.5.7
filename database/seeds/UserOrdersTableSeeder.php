<?php

use Illuminate\Database\Seeder;

class UserOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('user_orders')->insert([

           'user_id' => rand(1,50),
           'order_status_code' => rand(1,3),
           'payment_method_code' => rand(1, 3),
           'payment_confirmation_number' => rand(1000, 9999),
           'shipping_method_code' => rand(1,3),
           'order_placed_datetime' => date("Y-m-d "),
           'order_delivered_datetime' => date("Y-m-d "),
           'order_shipping_charges' => rand(100,1000),
           'other_order_details' => str_random(10),
       ]);
      }

    }
}
