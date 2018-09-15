<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('products')->insert([

           'product_category_code' => rand(1,5),
           'product_brand_code' => rand(1,5),
           'product_name' => str_random(10),
           'other_product_details' => str_random(10),
           'price' => rand(10,1000),

       ]);
      }
    }
}
