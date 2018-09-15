<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Stock_Item extends Model
{
  protected $table = 'stock_items';
  protected $fillable = [
    'product_id', 'quantity', 'supplier_id', 'product_cost', 
  ];



public function product()
{
  return $this->hasOne(Product::class,  'id', 'product_id');
}


}
