<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $this->call([
      ImagesTableSeeder::class,
      OrderItemsTableSeeder::class,
      PremisesTableSeeder::class,
      ProductsTableSeeder::class,
      RefAddressTypesTableSeeder::class,
      RefOrderStatusTableSeeder::class,
      RefPaymentMethodsTableSeeder::class,
      RefProductCategoriesTableSeeder::class,
      RefShippingMethodsTableSeeder::class,
      StockItemsTableSeeder::class,
      UserAddressesTableSeeder::class,
      UserFavouriteProductsTableSeeder::class,
      UserOrdersTableSeeder::class,
      UserTableSeeder::class,

    ]);
  }
}
