<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_Address_Type extends Model
{
  protected $table = 'ref_address_types';

  protected $primaryKey='address_type_code';

  //quizas agregar id
  protected $fillable = [
    'address_type_code', 'address_type_description', ];



}
