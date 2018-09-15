@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card ">
          <div class="card-header">Home</div>

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


        <div class="showcase">
          @component('components.who')
          @endcomponent
        </div>

        <div class="showcase">


          @isset($user_orders)
            {{-- {{dd($user_orders)}} --}}
            @foreach ($user_orders as $key => $order)

              @foreach ($order->items as $key => $value)
                Product Name: {{$value->product->product_name}}<br>
                Item Quantity: {{$value->item_order_quantity}}<br>
                Item Price:{{$value->item_price}}<br>
              @endforeach
              <br>
              Total Bill: {{$order->totalBill()}}<br><br>

              <select class="" name="">
                @foreach (Auth::user()->addresses as $key => $value)

                  <option value="{{$value->premise_id}}">{{$value->premise->street}}</option>
                @endforeach
              </select>
            @endforeach
            <br>
            <form method="get" action="#">

              {{ csrf_field() }}
              <button type="submit" class="btn btn-fefault add-to-cart">
                <i class="fa fa-money"></i>
                PAYYY
              </button>
            </form>
          @endisset
        </div>

      </div>
    </div>
  </div>
</div>
</div>
@endsection
