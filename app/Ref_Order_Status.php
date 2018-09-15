<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_Order_Status extends Model
{
  protected $table = 'ref_order_status';


  //quizas agregar id
  protected $fillable = [
    'order_status_code', 'order_status_description'
  ];






}
