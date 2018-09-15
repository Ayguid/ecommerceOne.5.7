<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ref_Address_Type;
use App\Premise;
use App\User_Address;
use App\Http\Controllers\Helpers\Input_Validator;
use App\User;




class Shipping_Method_Controller extends Controller
{



  public function showShippingMethods()
  {
    $ref_address_types=Ref_Address_Type::all();
    $data=['ref_address_types'=>$ref_address_types];
    return view('orders.shipping')->with('data', $data);
  }



  // public function saveAddress(Request $request)
  // {
  //
  //   $input_validator= new Input_Validator();
  //   $save = false;
  //   if ($input_validator->validatePremise($request)->fails()){
  //     $request->session()->flash('alert-danger', 'There was a problem adding your Address!');
  //     return redirect(route('shipping'))->withInput()->withErrors($input_validator->validatePremise( $request));
  //   }
  //
  //
  //
  //
  //   //validate address
  //   $user= User::find(Auth::user()->id);
  //   $premises=$user->premises;
  //
  //   foreach ($premises as $key => $premiseinfo) {
  //     if(($premiseinfo->number == $request->number && $premiseinfo->street == $request->street)&&$premiseinfo->addressType->address_type_code == $request->address_type_code){
  //       $save=false;
  //       $request->session()->flash('alert-danger', 'You have this address!');
  //       return redirect(route('checkout'))->withInput()->withErrors($input_validator->validatePremise( $request));
  //
  //     }
  //   }
  //
  //
  //
  //   $premise = new Premise;
  //   foreach ($request->input() as $parameter => $value) {
  //     foreach ($premise->getFillable() as $fillable) {
  //       if ($parameter==$fillable) {
  //         $premise->$fillable=$value;
  //       }
  //     }
  //   }
  //
  //
  //   $premise->save();
  //   $user_address = new User_Address;
  //   $user_address->user_id=Auth::user()->id;
  //   $user_address->address_type_code=$request->address_type_code;
  //   $save=$premise->address()->save($user_address);
  //
  //   if ($save) {
  //     $request->session()->flash('alert-success', 'Address Saved!');
  //     return redirect(route('checkout'));
  //
  //   }
  //   else {
  //     $request->session()->flash('alert-danger', 'There was a problem!');
  //     return redirect(route('shipping'))->withInput()->withErrors($input_validator->validatePremise( $request));
  //   }
  //
  //
  //
  //
  // }
}
