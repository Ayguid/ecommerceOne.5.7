<div class="navbar navbar-expand-md categories-menu top-btm-nav-colors">

  <ul class="navbar-nav ">
    @foreach (App\Ref_Product_Category::all() as $key => $category)
      <li class="nav-item">  <a class="nav-link" href="{{route('indexProducts', $category->product_category_code)}}">{{$category->product_category_description}}</a> </li>
      {{-- <li class="nav-item">  <a class="nav-link" href="#">{{$category->product_category_description}}</a> </li> --}}
{{--  --}}
    @endforeach
    <li class="nav-item" > <a class="nav-link" href="{{route('indexProducts')}}">All Products</a> </li>
  </ul>


</div>
