<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order_Item extends Model
{
  protected $table = 'order_items';


  //quizas agregar id
  protected $fillable = [
    'order_id', 'product_id', 'item_order_quantity', 'item_price'
  ];




  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'product_id');
  }




}
