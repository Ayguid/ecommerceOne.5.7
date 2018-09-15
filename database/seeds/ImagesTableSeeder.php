<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i <= 50; $i++) {
        DB::table('images')->insert([

           'product_id' => $i,
           'image_path' => str_random(10),



       ]);
      }
    }
}
