<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User_Address;

class Premise extends Model
{
  protected $table = 'premises';


  //quizas agregar id
  protected $fillable = [
    'country', 'state', 'city', 'street', 'number', 'apartment', 'postal_code' ];


public function address()
{
  return $this->hasOne(User_Address::class, 'premise_id', 'id');
}



public function addressType()
{
  return $this->hasOne(User_Address::class);
}






public function addressPretty()
{
  return $this->street .' '. $this->number .' '. $this->city .' '.$this->state ;
}



}
