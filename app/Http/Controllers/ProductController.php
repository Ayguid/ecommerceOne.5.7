<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Ref_Product_Category;
use App\Ref_Product_Brand;
use App\Image;
use App\Http\Controllers\Helpers\Input_Validator;
use Illuminate\Support\Facades\Storage;
use App\Stock_Item;
use DB;

class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }




  public function showAddProductsForm()
  {
    $categories=Ref_Product_Category::All();
    $brands=Ref_Product_Brand::All();
    $data= ['categories'=>$categories, 'brands'=>$brands];
    return view('adminFunctions.addProducts')->with('data', $data);
  }






  public function showEditProductsForm($id)
  {
    $categories=Ref_Product_Category::All();
    $brands=Ref_Product_Brand::All();
    $product=Product::find($id);
    $data= ['categories'=>$categories, 'brands'=>$brands, 'product'=>$product];
    return view('adminFunctions.editProduct')->with('data', $data);
  }







  public function saveProduct(Request $request)
  {

    return DB::transaction(function () use ($request) {

    $input_validator= new Input_Validator();
    $save = false;
    if ($input_validator->validateNewProductRequest($request)->fails())
    {
      $save = false;
    }

    else if (!$input_validator->validateNewProductRequest($request)->fails())
    {

      $product = new Product($input_validator->getInputs($request));
      $save = $product->save();
      $stockItem= new Stock_Item;
      $stockItem->quantity=$request->stock;
      $product->stock()->save($stockItem);

      if ($request->file('images') !== null){
        foreach ($request->file('images') as $key => $value) {
          $newImage= new Image();
          $file_name = md5(uniqid() . time()) . '.' . $value->getClientOriginalExtension();
          $newImage->image_path=$file_name;
          $product->images()->save($newImage);
          $value->storeAs('public/uploads/Product_Photo', $file_name);
        }
      }
    }

    if ($save)
    {
      $request->session()->flash('alert-success', 'Added Succesfully!');
      return redirect(route('admin.addProducts'));
    }
    else
    {
      $request->session()->flash('alert-danger', 'There was a problem adding your product!');
      return redirect(route('admin.addProducts'))->withInput()->withErrors($input_validator->validateNewProductRequest( $request));
    }

    });



  }






  public function update(Request $request)
  {
    $id=$request->id;
    $input_validator= new Input_Validator();
    $update = false;

    if ($input_validator->validateEditProductRequest($request)->fails())
    {
      $update = false;
    }

    else if (!$input_validator->validateEditProductRequest($request)->fails())
    {
      $product=Product::find($id);
      $update=$product->update($input_validator->getInputs($request));
      $product->stock()->update(['quantity'=>$request->stock]);



      if ($request->file('images') !== null)
      {
        //refinar abstraer a image controller
        foreach ($product->images as $key => $image)
        {
          Storage::delete('public/uploads/Product_Photo/'.$image->image_path);
        }
        $product->images->each->delete();


        foreach ($request->file('images') as $key => $image)
        {
          $newImage= new Image();
          $file_name = md5(uniqid() . time()) . '.' . $image->getClientOriginalExtension();
          $newImage->image_path=$file_name;
          $product->images()->save($newImage);
          $image->storeAs('public/uploads/Product_Photo', $file_name);
        }
      }

    }

    if ($update)
    {
      $request->session()->flash('alert-success', 'Updated Succesfully!');
      return redirect(route('admin.showEditProductForm', $id));
    }else
    {
      $request->session()->flash('alert-danger', 'There was a problem updating your product!');
      return redirect(route('admin.showEditProductForm', $id))->withInput()->withErrors($input_validator->validateEditProductRequest($request));
    }
  }









}
