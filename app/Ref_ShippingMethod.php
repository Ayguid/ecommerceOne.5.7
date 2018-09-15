<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User_Order;

class Ref_ShippingMethod extends Model
{
  protected $table = 'ref_shipping_methods';
  protected $fillable = [
    'shipping_method_code', 'shipping_method_description', 'shipping_charges',
  ];



public function orders()
{
  return $this->hasMany(User_Order::class,  'shipping_method_code');
}





}
