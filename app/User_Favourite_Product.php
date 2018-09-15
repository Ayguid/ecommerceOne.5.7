<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class User_Favourite_Product extends Model
{

    protected $table = 'user_favourite_products';
    protected $fillable = [
      'user_id', 'product_id',
    ];




    public function product()
    {
      return $this->hasOne(Product::class, 'id');
    }

}
