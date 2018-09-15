<?php

namespace App\Http\Controllers\Helpers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class Input_Validator extends controller
{


  // public function __construct()
  // {
  //   // $this->middleware('auth:admin');
  // }
  public function getInputs($request)
  {
    return $input = [
      'product_category_code' => $request->input("product_category"),
      'product_brand_code' => $request->input("product_brand"),
      'product_name' => $request->input("product_name"),
      'other_product_details' => $request->input("other_product_details"),
      'price' => $request->input("price"),
    ];
  }


  //validate new product request
  public function validateNewProductRequest($request)
  {
    return  $validatedData = Validator::make($request->all(), [
      'product_category' => 'required|max:4',
      'product_brand' => 'required|max:4',
      'product_name' => 'required|unique:products|max:100',
      'other_product_details' => 'required|max:255',
      'price' => 'required|max:9',

      'images.*' => 'mimes:jpeg,jpg,gif,bmp,png|max:50000',
    ],
    [
      'images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
      'images.*.max' => 'Sorry! Maximum allowed size for an image is 50MB',
    ]);
  }



  //validate edit product request
  public function validateEditProductRequest($request)
  {
    return  $validatedData = Validator::make($request->all(), [
      'product_category' => 'required|max:4',
      'product_brand' => 'required|max:4',
      'product_name' => 'required|max:100',
      'other_product_details' => 'required|max:255',
      'price' => 'required|max:9',

      'images.*' => 'mimes:jpeg,jpg,gif,bmp,png|max:50000',
    ],
    [
      'images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
      'images.*.max' => 'Sorry! Maximum allowed size for an image is 50MB',
    ]);
  }



  //validate category request
  public function validateCategory($request)
  {
    return $validatedCategory = Validator::make($request->all(),[
      'product_category_description' => 'required|max:100|unique:ref_product_categories',
    ]);
  }

  //validate brand request
public function validateBrand($request)
{
  return $validatedCategory = Validator::make($request->all(),[
    'product_brand_name' => 'required|max:100|unique:ref_product_brand',
  ]);
}


  public function validatePremise($request)
  {
    return $validatedPremise = Validator::make($request->all(),[
      'country' => 'required|max:5',
      'state' => 'required|max:100',
      'city' => 'required|max:100',
      'street' => 'required|max:150',
      'number' => 'required|max:20',
      'apartment' => 'required|max:100',
      'postal_code' => 'required|max:50',
    ]);
  }


}
