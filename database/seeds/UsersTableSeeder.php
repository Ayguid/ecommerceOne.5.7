<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('users')->insert([
          'email' => str_random(10).'@gmail.com',
           'name' => str_random(10),
           'phone' => str_random(10),
           'address' => str_random(10),
           'username' => str_random(10),
           'password' => bcrypt('secret'),
       ]);
      }




    }
}
