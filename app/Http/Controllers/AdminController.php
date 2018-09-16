<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ref_Product_Category;
use App\Ref_Product_Brand;
// use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Image;
use App\Http\Controllers\Helpers\Input_Validator;



class AdminController extends Controller
{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin');
  }




  public function showEditProductsForm($id)
  {
    $categories=Ref_Product_Category::All();
    $brands=Ref_Product_Brand::All();
    $product=Product::find($id);
    $data= ['categories'=>$categories, 'brands'=>$brands, 'product'=>$product];
    return view('adminFunctions.editProduct')->with('data', $data);
  }






}
