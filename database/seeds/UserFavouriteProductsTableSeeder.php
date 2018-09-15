<?php

use Illuminate\Database\Seeder;

class UserFavouriteProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 5; $i++) {
        DB::table('user_favourite_products')->insert([
           'user_id' => rand(1, 5),
           'product_id' => rand(1, 5),
       ]);
      }
    }
}
