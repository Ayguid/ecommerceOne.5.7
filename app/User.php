<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\User_Order;
use App\User_Address;
use App\User_Favourite_Product;
use App\Premise;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'name', 'email', 'phone', 'address', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




      public function orders()
      {
        return $this->hasMany(User_Order::class);
      }


      public function addresses()
      {
        return $this->hasMany(User_Address::class);
      }


      public function favourite_products()
      {
        return $this->hasMany(User_Favourite_Product::class);
      }


      public function premises()
      {
        return $this->hasManyThrough(Premise::class, User_Address::class, 'user_id', 'id', 'id', 'premise_id' );
      }
}
