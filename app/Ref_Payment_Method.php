<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User_Order;

class Ref_Payment_Method extends Model
{


  protected $table = 'ref_payment_methods';


  //quizas agregar id
  protected $fillable = [
    'payment_method_code', 'payment_method_description',
  ];




  public function orders()
  {
  return  $this->hasMany(User_Order::class, 'payment_method_code');
  }



}
