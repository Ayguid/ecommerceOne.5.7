<?php

use Illuminate\Database\Seeder;

class RefOrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 2; $i++) {
        DB::table('ref_order_status')->insert([
           'order_status_code' => rand(1, 2),
           'order_status_description' => str_random(5),
       ]);
      }
    }
}
