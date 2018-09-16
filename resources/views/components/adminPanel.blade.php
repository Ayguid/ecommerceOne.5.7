<div class="">


@if (Auth::guard('web')->check())
<p class="text-success">
You are Logged In as a <strong>USER</strong>
</p>



@else


  <p class="text-danger">
    You are Logged Out as a <strong>USER</strong>
  </p>

@endif



@if (Auth::guard('admin')->check())
<p class="text-success">
You are Logged In as a <strong>ADMIN</strong><br>

<a href="{{route('admin.addProducts')}}">Add Product</a><br>
<a href="{{route('admin.showCategories')}}">Categories</a><br>
<a href="{{route('admin.showBrands')}}">Brands</a><br><br>
<a href="{{route('admin.logout')}}">Log Out</a><br>
</p>



@endif
</div>
