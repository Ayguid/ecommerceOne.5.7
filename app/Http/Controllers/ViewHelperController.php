<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


// use Request;

class ViewHelperController extends Controller
{

  //index all products /or by category
  public function index( Request $request)
  {
    if ($request->id) {
      $product=Product::where('id', $request->id)->first();
      return view ('productView')->with('product',$product);
    }
     else if($request->category)
    {
      $products=Product::where('product_category_code', $request->category)->paginate(5);
    }
    else
    {
      $products=Product::paginate(5);
    }
    return view ('landing')->with('data',['products'=>$products ]);
  }




  public function filter(Request $request)
  {
    $products=Product::query()
    ->when($request->has('product_name'), function ($query) use ($request) {
      return $query->where('product_name', 'LIKE', '%' . $request->product_name .'%');
    })
    ->when($request->has('product_category_code'), function ($query) use ($request) {
      return $query->whereIn('product_category_code', $request->product_category_code);
    })
    ->when($request->has('product_brand_code'), function ($query) use ($request) {
      return $query->whereIn('product_brand_code', $request->product_brand_code);
    })
    ->paginate(5);
    return view ('landing')->with('data',['products'=>$products ]);
  }

















  //
  //
  // //show user Orders
  //   public function showOrders()
  //   {
  //       $user_orders=Auth::user()->orders;
  //       return view('orders.userOrders')->with('user_orders', $user_orders);
  //   }
  //
  //
  //
  // public function checkout()
  // {
  //   $user_orders=Auth::user()->orders->where('order_status_code', 1)->all();
  //   return view('orders.checkout')->with('user_orders', $user_orders);
  // }
  //


}
