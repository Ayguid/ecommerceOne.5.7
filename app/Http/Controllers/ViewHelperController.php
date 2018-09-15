<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Ref_Product_Category;
use App\Ref_Product_Brand;

// use Request;

class ViewHelperController extends Controller
{



  // public function __construct()
  // {
  //     // $this->middleware('auth',['only'=>'checkout']);
  //     // $this->middleware('auth',['except' => ['showOrders', 'checkout']]);
  //     $this->middleware('auth',['only' => ['showOrders', 'checkout']]);
  // }



  //index all or single product /or categories prodcuts
  public function index( Request $request)
  {
    // $categories=Ref_Product_Category::all();
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
    // return view ('landing')->with('data', $data=['categories'=>$categories, 'products'=>$products ]);
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
