<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Ref_Order_Status;
use App\Order_Item;
use App\Ref_ShippingMethod;
use App\Ref_Payment_Method;
use App\Product;


class User_Order extends Model
{
  protected $table = 'user_orders';


  //quizas agregar id
  protected $fillable = [
    'user_id', 'order_status_code', 'payment_method_code', 'payment_confirmation_number', 'shipping_method_code', 'order_placed_datetime', 'order_delivered_datetime',
    'order_shipping_charges', 'other_order_details',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */



  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public function orderStatus()
  {
    return $this->hasOne(Ref_Order_Status::class, 'order_status_code', 'order_status_code');
  }


  public function items()
  {
    return $this->hasMany(Order_Item::class, 'order_id');
  }


  public function products()
  {
    return $this->hasManyThrough(Product::class, Order_Item::class, 'order_id', 'id', 'id', 'product_id');
  }

  public function shippingMethod()
  {
    return $this->hasOne(Ref_ShippingMethod::class, 'id', 'shipping_method_code');
  }


  public function paymentMethod()
  {
    return $this->hasOne(Ref_Payment_Method::class, 'payment_method_code');
  }


  //functions
  public function totalBill()
  { $products= $this->items;
    $total=0;
    foreach ($products as $key => $value) {
      $value->item_price;
      $total += ($value->item_price * $value->item_order_quantity);
    }
    return $total;
  }
}
