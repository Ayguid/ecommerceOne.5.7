<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ref_Product_Category;
// use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Helpers\Input_Validator;

class Ref_Product_Category_Controller extends Controller
{


  public function __construct()
  {
    $this->middleware('auth:admin');
  }







  public static function showCategories(){
    $categories=Ref_Product_Category::All();
    return view('adminFunctions.addCategories')->with('categories', $categories);
  }









  public function saveCategory(Request $request)
  {
    $input_validator = new Input_Validator();
    if ($input_validator->validateCategory($request)->fails())
    { $request->session()->flash('alert-danger', 'There was a problem adding your category!');
      return redirect(route('admin.showCategories'))->withInput()->withErrors($input_validator->validateCategory( $request));
    }
    else
    {
      $category= new Ref_Product_Category();
      $category->product_category_description=$request->product_category_description;
      $category->product_category_code =(Ref_Product_Category::lastCategory()->product_category_code)+(1);

      if ($category->save())
      {
        $request->session()->flash('alert-success', 'Added Succesfully!');
        return self::showCategories();
      }
    }
  }






  public function updateCategory(Request $request)
  {

    $category=  Ref_Product_Category::find($request->category_id);
    $category->product_category_description = $request->product_category_description;
    $input_validator = new Input_Validator();

    if ($input_validator->validateCategory($request)->fails())
    {
      $request->session()->flash('alert-danger', 'There was a problem updating your category!');
      return redirect(route('admin.showCategories', $request->category_id))->withInput()->withErrors($input_validator->validateCategory( $request));
    }


    if (!$input_validator->validateCategory($request)->fails())
    {
      $category->update();
      $request->session()->flash('alert-success', 'Updated Succesfully!');
      return self::showCategories();
    }

  }








}
