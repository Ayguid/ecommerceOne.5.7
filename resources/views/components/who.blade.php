<div class="">


@if (Auth::guard('web')->check())
<p class="text-success">
You are Logged In as a <strong>USER</strong>
</p>

<a href="{{route('showOrders')}}">My Orders</a>









@else
  <p class="text-danger">
    You are Logged Out as a <strong>USER</strong>
  </p>
@endif




</div>
