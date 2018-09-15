<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class Image extends Model
{
  protected $table = 'images';


  //quizas agregar id
  protected $fillable = [
    'product_id', 'image_path',
  ];



  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'product_id');
  }




}
