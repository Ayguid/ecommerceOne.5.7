<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class Ref_Product_Brand extends Model
{
  protected $table = 'ref_product_brand';


  //quizas agregar id
  protected $fillable = [
    'product_brand_code', 'product_brand_name'
  ];



  public function products()
  {
    return $this->hasMany(Product::class, 'product_brand_code');
  }




  public function categories()
  {
    return $this->hasManyThrough(Ref_Product_Category::class, Product::class, 'product_brand_code', 'product_category_code', 'product_brand_code', 'product_category_code');
  }





  public static function lastBrand(){
    return self::all('product_brand_code')->last();
  }



}
