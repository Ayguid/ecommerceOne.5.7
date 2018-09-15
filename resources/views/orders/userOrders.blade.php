@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card ">
          <div class="card-header">Orders</div>

          <div class="card-body">
            @if(Session::has('alert-success'))
              <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
            @endif
            @if(Session::has('alert-danger'))
              <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
            @endif
            {{-- @if (session('status'))
            <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif --}}



        <div class="orderDataCart">


          @isset($user_orders)
            {{-- {{dd($user_orders)}} --}}
            @foreach ($user_orders->reverse() as $order)

              <table class="order">
                <thead>
                  <tr>
                    <td>Order ID: {{$order->id}}</td>
                    <td>Order Status: {{$order->orderStatus->order_status_description}}</td>
                  </tr>

                  <tr>
                    <td>Products:</td>
                    <td>Price:</td>
                    <td>Quantity:</td>
                  </tr>

                </thead>

                <tbody>
                  <form class="" action="{{route('deleteOrder')}}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="order_id" value="{{$order->id}}" hidden>
                   <button type="submit" name="delete_order">Delete Order</button>
                  </form>
                @foreach ($order->products as $product)
                  <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->itemOrderQuantity->item_order_quantity}}</td>
                  </tr>


                @endforeach
                <tr>
                  <td>Order Total: {{$order->totalBill()}} $</td>
                </tr>
              </tbody>
            </table>
            <br>
            {{-- {{App\User_Order::totalBill()}} --}}
            {{-- {{App\User_Order::totalBill()}} --}}
          @endforeach



          <br>



        @endisset
      </div>

    </div>
  </div>
</div>
</div>
</div>
@endsection
