<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 84px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  </style>
</head>
<body>
  <div class="">
    @if (Route::has('login'))
      <div class="top-right links">
        @auth
          <a href="{{ url('/home') }}">Home</a>
        @else
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('register') }}">Register</a>
        @endauth
      </div>
    @endif



    {{-- <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel">
            @component('components.who')

            @endcomponent

          </div>
        </div>
      </div>
    </div> --}}


    {{-- On sale products display --}}

    <div class="">
    <h1>eCommerceOne</h1>
    @isset($productsOnSale)

    <h3>Products On Sale</h3>
    @foreach ($productsOnSale as $productOnSale)
    {{-- Name: {{$productOnSale->product->product_name}}<br> --}}
    <a href="{{route('showProduct', $productOnSale->product->id)}}">{{$productOnSale->product->product_name}}</a><br>
    @foreach ($productOnSale->product->images as $key => $value)
    <img width="100px" src="{{asset('storage/uploads/Product_Photo/'.$value->image_path)}}" alt=""> <br>
  @endforeach

  Price: {{$productOnSale->product->price}}<br>
  Discount: {{$productOnSale->discount*100}}%<br>
  Discount Price: {{$productOnSale->product->discountPrice()}}<br>
  Stock: {{$productOnSale->product->stock->quantity}}<br>
  Product Category: {{$productOnSale->product->category->product_category_description}}<br><br>
@endforeach
@endisset
</div>




  {{-- @include('components.cart', ['cart' =>$cart]) --}}




{{-- User Favourite products  --}}

{{-- <div class="">
@php
$user=App\User::find(51) ;
foreach ($user->favourite_products as $key => $value) {
echo ($value->product->product_name).'<br>';
echo ($value->product->brand->product_brand_name).'<br>';
}
@endphp
</div> --}}








{{-- Brands produxcts  --}}
{{-- @php
  $brand= App\Ref_Product_Brand::find(2);
  foreach ($brand->products as $product) {
      echo($product->product_name).'<br>';
  }
@endphp --}}







{{-- Payment Order Method  --}}
{{-- @php
  $order= App\User_Order::find(1);
echo($order->paymentMethod->payment_method_description).'<br>';
@endphp --}}







{{-- User_Order Products Through Order Items --}}
{{-- @php
$order= App\User_Order::find(1);
echo($order).'<br>'.'<br>';
echo($order->products).'<br>';
foreach ($order->products as $value) {
echo ($value->product_name).'<br>';
}
@endphp --}}




{{-- paymentMethod orders  --}}
{{-- @php
  $paymentMethod= App\Ref_Payment_Method::find(1);
  echo($paymentMethod->orders);
@endphp --}}

  <a href="{{route('productListing')}}">More Products</a>
</div>


</body>
</html>
