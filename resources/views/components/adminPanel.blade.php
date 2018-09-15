<div class="">


@if (Auth::guard('web')->check())
<p class="text-success">
You are Logged In as a <strong>USER</strong>
</p>

{{-- <a href="{{route('showOrders')}}">My Orders</a> --}}


@else


  <p class="text-danger">
    You are Logged Out as a <strong>USER</strong>
  </p>

@endif



@if (Auth::guard('admin')->check())
<p class="text-success">
You are Logged In as a <strong>ADMIN</strong><br>

<a href="{{route('admin.addProducts')}}">Add Product</a><br>
<a href="{{route('admin.showCategories')}}">Add/Edit Category</a><br>
<a href="{{route('admin.addBrands')}}">Add/Edit Brand</a><br><br>
<a href="{{route('admin.logout')}}">Log Out</a><br>
{{-- <a href="{{route('admin.showProducts')}}">Show Products</a> --}}
</p>


{{-- @else
  <p class="text-danger">
    You are Logged Out as a <strong>ADMIN</strong>
  </p> --}}


@endif
</div>
