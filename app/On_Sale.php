<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;



class On_Sale extends Model
{
  protected $table = 'on_sales';


  protected $fillable = [
    'product_id', 'discount',
  ];



  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'product_id');
  }




}
