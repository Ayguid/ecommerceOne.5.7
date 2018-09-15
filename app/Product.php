<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Ref_Product_Category;
use App\Stock_Item;
use App\On_Sale;
use Illuminate\Support\Facades\DB;
use App\Ref_Product_Brand;
use App\Order_Item;

class Product extends Model
{
  protected $table = 'products';


  //quizas agregar id
  protected $fillable = [
    'product_category_code', 'product_brand_code', 'product_name', 'other_product_details', 'price',
  ];



  //relaciones
  public function images()
  {
    return $this->hasMany(Image::class);
  }



  public function category()
  {
    return $this->hasOne(Ref_Product_Category::class, 'product_category_code', 'product_category_code');
  }



  public function stock()
  {
    return $this->hasOne(Stock_Item::class);
  }


  public function onSale ()
  {
    return $this->hasOne(On_Sale::class, 'product_id');
  }


  
  public function brand()
  {
    return $this->hasOne(Ref_Product_Brand::class, 'product_brand_code', 'product_brand_code');
  }


  public function itemOrderQuantity()
  {
    return $this->hasOne(Order_Item::class,  'product_id');
  }

  //functions
  public function discountPrice()

  {

    return ($this->price)*(1-($this->onSale['discount']));

  }
}
