<?php

use Illuminate\Database\Seeder;

class StockItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i <= 50; $i++) {
        DB::table('stock_items')->insert([

           'product_id' => $i,
           'quantity' => rand(10, 100),
           'supplier_id' => rand(1, 4),
           'product_cost' => rand(10, 70),

       ]);
      }
    }
}
