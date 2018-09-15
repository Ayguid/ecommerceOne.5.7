<?php

use Illuminate\Database\Seeder;

class RefProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 5; $i++) {
        DB::table('ref_product_categories')->insert([
           'product_category_code' => rand(1, 5),
           'product_category_description' => str_random(5),
       ]);
      }
    }
}
