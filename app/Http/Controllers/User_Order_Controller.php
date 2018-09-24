<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User_Order;
use App\Order_Item;
use Cart;
use Carbon\Carbon;
use MP;

class User_Order_Controller extends Controller
{




  public function __construct()
  {
    $this->middleware('auth');
  }




  public function showOrderData()
  {

    $data=[
      'cart'=>$cart = Cart::getContent(),
      'user'=>$user= Auth::user()
    ];

    return view('data-order')->with('data', $data);
  }




  //show user Orders
  public static function showOrders()
  {
    self::updateOrderStatus();
    $user_orders=Auth::user()->orders;
    return view('orders.userOrders')->with('user_orders', $user_orders);
  }



  public  static function updateOrderStatus()
  {
    $mp= new MP(env("MP_APP_ID"), env("MP_APP_SECRET"));
    foreach (Auth::user()->orders as $order){
      $filters = [
        "external_reference" => $order->id,
      ];
      if ($order->order_status_code == 1) {
        $paymentInfo = $mp->search_payment($filters, 0, 1);
        if (!empty($paymentInfo['response']['results'])){
          switch ($paymentInfo['response']['results'][0]['collection']['status_code']) {
            case 0:
            // $userOrder= User_Order::find($order->id);
            $userOrder= Auth::user()->orders->find($order->id);
            $userOrder->order_status_code = 2;
            $userOrder->update();
            break;

            default:
            // code...
            break;
          }
        }
      }
    }
    return;
  }










  public function deleteOrder(Request $request)
  {

    $user_order= User_Order::find($request->order_id);
    $statusCode=$user_order->order_status_code;


    if ($user_order->user_id === Auth::user()->id && $user_order->fixed_user_id === Auth::user()->id )
    {
      //si era estado cart/o nunca confirmado
      if ($statusCode==1)
      {
        $user_order->items->each->delete();
        $user_order->delete();
      }
      //seguid con otros casos

      //no tira la orden! solo rompe la relacion asi sigue en base de datos.
      else
      {
        $user_order->user_id=0;
        $user_order->update();
      }
      //vuelve a la vista de orders
      return self::showOrders();
    }

  }






  public static function cartToOrder(Request $request)
  {
    $cart = \Cart::getContent();
    // dd($cart);
    if ($cart->count() > 0)
    {
      //faltan validacioones
      $user_order = new User_Order();
      $user_order->user_id = Auth::user()->id;
      $user_order->fixed_user_id = Auth::user()->id;
      $user_order->billing_premise_id = $request->billing_premise_id;
      $user_order->shipping_premise_id = $request->shipping_premise_id;
      $user_order->order_placed_datetime = new Carbon();;
      $saveCart = $user_order->save();


      foreach ($cart as $key => $cartItem)
      {
        $order_item = new Order_Item();
        $order_item->product_id = $cartItem->id;
        $order_item->item_order_quantity = $cartItem->quantity;
        $order_item->item_price = $cartItem->price;
        $user_order->items()->save($order_item);
      }
      // destruir aca??!
      Cart::clear();

      if ($saveCart)
      {
        // $request->session()->flash('alert-success', 'Order Saved');
        return self::showOrders();
      }

    }
    else {
      $request->session()->flash('alert-danger', 'There was a problem saving your Order!');
      return self::showOrders();
    }


  }










}
