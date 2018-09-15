<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('order_items')->insert([
           'order_id' => rand(1,10),
           'product_id' => rand(1,10),
           'item_order_quantity' => rand(1,10),
           'item_price' => rand(5, 150),
       ]);
      }

    }
}
