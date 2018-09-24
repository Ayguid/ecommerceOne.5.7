<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MP;
use App\User_Order;
use Illuminate\Support\Facades\Auth;


class MercadoPagoController extends Controller
{

  public function mercadoPago(Request $request)
  {
    return redirect()->to($this->generatePaymentGateway($request->order_id));
  }






  public function generatePaymentGateway($id)
  {

    // $order=User_Order::find($id)->items;
    $order=User_Order::find($id);
    // dd($order);
    $mp= new MP(env("MP_APP_ID"), env("MP_APP_SECRET"));


    // $filters = array (
    //   "external_reference" => $order->id,
    // );
    // $paymentInfo = $mp->search_payment($filters, 0, 10);


    $preference_data = [
      "external_reference"=>$order->id ,
      "back_urls"=>["success"=>"http://localhost:8000/"],
      "auto_return"=>"approved",
      "items" => [],
    ];


    foreach ($order->items as $item) {
      $array= ['title'=>$item->product->product_name, 'quantity'=>$item->item_order_quantity, "currency_id" => "ARG",  "unit_price" => $item->item_price];
      array_push ($preference_data['items'] , $array);
    }



    $preference = $mp->create_preference($preference_data);
    // dd($preference['response']);

    // $filters = array (
    //   "external_reference" => 12
    // );
    // $paymentInfo = $mp->search_payment($filters, 0, 10);

    return $preference['response']['init_point'];
    // return $preference['response']['sandbox_init_point'];


  }


















}
