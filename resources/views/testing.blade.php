@extends('layouts.app')

@section('content')





@php
  $mp= new MP(env("MP_APP_ID"), env("MP_APP_SECRET"));

if (!isset($_GET["id"], $_GET["topic"]) || !ctype_digit($_GET["id"])) {
http_response_code(400);
return;
}

// Get the payment and the corresponding merchant_order reported by the IPN.
if($_GET["topic"] == 'payment'){
$payment_info = $mp->get("/v1/payments/" . $_GET["id"]);
$merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["order"]["id"]);
// Get the merchant_order reported by the IPN.
} else if($_GET["topic"] == 'merchant_order'){
$merchant_order_info = $mp->get("/merchant_orders/" . $_GET["id"]);
}

if ($merchant_order_info["status"] == 200) {
// If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
$paid_amount = 0;

foreach ($merchant_order_info["response"]["payments"] as  $payment) {
  if ($payment['status'] == 'approved'){
    $paid_amount += $payment['transaction_amount'];
  }
}

if($paid_amount >= $merchant_order_info["response"]["total_amount"]){
  if(count($merchant_order_info["response"]["shipments"]) > 0) { // The merchant_order has shipments
    if($merchant_order_info["response"]["shipments"][0]["status"] == "ready_to_ship"){
      print_r("Totally paid. Print the label and release your item.");
    }
  } else { // The merchant_order don't has any shipments
    print_r("Totally paid. Release your item.");
  }
} else {
  print_r("Not paid yet. Do not release your item.");
}
}

@endphp





@endsection
