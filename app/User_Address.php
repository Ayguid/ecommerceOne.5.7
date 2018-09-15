<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Ref_Address_Type;
use App\Premise;
class User_Address extends Model
{
  protected $table = 'user_addresses';


  //quizas agregar id
  protected $fillable = [
    'user_id', 'premise_id', 'address_type_code', ];



  public function user()
  {
    return $this->belongsTo(Customer::class);
  }


  public function addressType()
  {
    return $this->hasOne(Ref_Address_Type::class,'address_type_code', 'address_type_code');
  }


  public function premise()
  {
  return $this->hasOne(Premise::class, 'id', 'premise_id');
  }



  





}
