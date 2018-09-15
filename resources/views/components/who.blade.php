<div class="">


@if (Auth::guard('web')->check())
<p class="text-success">
You are Logged In as a <strong>USER</strong>
</p>

<a href="{{route('showOrders')}}">My Orders</a>
{{-- {{DD(Auth::guard('web')->user())}} --}}
{{-- @foreach (Auth::guard('web')->user()->orders as $key => $order)
{{$order}}
@endforeach
--}}

@else


  <p class="text-danger">
    You are Logged Out as a <strong>USER</strong>
  </p>

@endif




</div>
