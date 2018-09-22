@extends('layouts.app')

@section('content')

  {{-- {{dd($cart)}} --}}

  @isset($cart)
    <div class="col-lg-6">
      <h2>CART</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>




          @foreach ($cart as $item)
            <tr >
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->price}}</td>

              <td>
                <form class="" action="{{route('cart.remove')}}" method="post">
                  {{ csrf_field() }}
                  <input type="text" name="product_id" value="{{$item->id}}" hidden>
                  <button type="submit" class="btn btn-sm btn-danger">remove</button>
                </form>
              </td>
            </tr>
          @endforeach


        </tbody>
      </table>



      <table class="table">
        <tr>
          <td>Items on Cart:</td>
          <td>{{$cart->count()}}</td>
        </tr>

        <tr>
          <td>Total Qty:</td>
          <td>{{Cart::getTotalQuantity()}}</td>
        </tr>
        <tr>
          <td>Sub Total:</td>
          <td>{{Cart::getSubTotal()}} $</td>
        </tr>
        <tr>
          <td>Total:</td>
          <td>{{Cart::getTotal()}} $</td>
        </tr>
      </table>

      @if ($cart->count() > 0)
        <form class="" action="{{route('cart.remove')}}" method="post">
          {{-- <input type="text" name="clear_cart" value="{{$item->id}}" hidden> --}}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-sm btn-danger">Clear Cart</button>
        </form>
        {{-- <a href="{{route('cart.clear')}}">Clear Cart</a> --}}

        <a class="btn btn-default check_out" href="{{route('order-data')}}">Check Out</a>
      @endif
    @endisset



  </div>

@endsection
