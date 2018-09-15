<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Ref_Product_Brand;


class Ref_Product_Category extends Model
{

  protected $table = 'ref_product_categories';
  protected $fillable = [
    'product_category_code', 'product_category_description',
  ];







public function products()
{
  return $this->hasMany(Product::class, 'product_category_code');
}





public static function lastCategory(){
  return self::all('product_category_code')->last();
}



// public function brands()
// {
//   return $this->hasManyThrough(Ref_Product_Brand::class, Product::class, 'product_category_code','product_brand_code', 'product_category_code','product_brand_code');
// }











}
