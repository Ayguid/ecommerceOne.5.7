<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Image;
use App\Http\Controllers\Helpers\Input_Validator;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }



  public function saveProduct(Request $request)
  {
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

  }




  public function update(Request $request, $id)
  {
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
      //falta que se borren las imagenes viejas
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
      //
    }

    if ($update)
    {
      $request->session()->flash('alert-success', 'Updated Succesfully!');
      return redirect(route('admin.editProduct', $id));
    }else
    {
      $request->session()->flash('alert-danger', 'There was a problem updating your product!');
      return redirect(route('admin.editProduct', $id))->withInput()->withErrors($input_validator->validateEditProductRequest($request));
    }
  }




    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      //
    }







  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }




  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
