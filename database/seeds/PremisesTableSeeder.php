<?php

use Illuminate\Database\Seeder;

class PremisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('premises')->insert([
           'country' => str_random(10),
           'state' => str_random(10),
           'city' => str_random(10),
           'street' => str_random(10),
           'number' => rand(11111111,99999999),
           'apartment' => str_random(2),
           'postal_code' => str_random(4),
       ]);
      }
    }
}
