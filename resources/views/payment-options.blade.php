@extends('layouts.app')

@section('content')





  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

  @if(Session::has('alert-success'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
  @endif
  @if(Session::has('alert-danger'))
    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
  @endif



  <div class="orderDataCart">


  </div>



  <div class="userAddresses">
    <div class="paymentMethods">
<form class="" action="#" method="get">
  {{ csrf_field() }}
  @foreach (App\Ref_Payment_Method::all() as $key => $paymentMethod)

    <input type="radio" name="payment_method_code" value="{{$paymentMethod->payment_method_code}}"> &nbsp; &nbsp;{{$paymentMethod->payment_method_description}} <br><br>

  @endforeach
</form>



    </div>



    <div class="clearfix"></div>



  </div>












    {{-- <h5>Choose your Payment Method</h5>









<div class="paymentMethods">

  @foreach (App\Ref_Payment_Method::all() as $key => $paymentMethod)
    <a href="">{{$paymentMethod->payment_method_description}}</a><br>


  @endforeach


</div>


</div> --}}












@endsection
