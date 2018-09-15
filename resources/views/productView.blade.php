@extends('layouts.app')

@section('content')





  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

  <div class="categoriesMenu">

    @component('components.categoriesMenu')
    @endcomponent

  </div>






  <div class="productView">


    <div class="productData">
      <div class="productDataInner">
        <h2>{{$product->product_name}}</h2>
        <h3>Price: {{$product->price}}</h3>
        <h3>{{$product->category->product_category_description}}</h3>
        <h3>{{$product->brand->product_brand_name}}</h3>
              @if (Auth::guard('admin')->check())
                <a href="{{route('admin.editProduct', $product->id)}}">Edit Product</a>
              @endif
            </div>
    </div>



    <div id="myModal" class="modal">
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="imgModal">
      <!-- Modal Caption (Image Text) -->
    </div>



    <div class="productPhotos">
      <div class="innerProductPhotos">
        {{-- {{dd($product->images)}} --}}
        @foreach ($product->images as  $image)
          <img class="productPic" width="" src="{{asset('storage/uploads/Product_Photo/'.$image->image_path)}}" alt="">
          {{-- <img class="productPic" src="{{$image->image_path}}" alt=""> --}}
        @endforeach
      </div>
    </div>

    {{-- @if (!$product->images->first())
      <img width="25%;" src="{{asset('storage/uploads/Product_Photo/default-product.jpg')}}" alt=""><br>
    @endif --}}
    <br>
    <div class="clearfix">

    </div>
    <div class="productDetails">
      <div class="innerProductDetails">


        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>





    <script type="text/javascript">
    var images = document.getElementsByClassName('productPic');
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("imgModal");

    //por cada img clrea el event listenter para abrir el modal
    for (var i = 0; i < images.length; i++) {
      images[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
      }
    }

    //cierra el ImgModal
    modalImg.onclick = function() {
      modal.style.display = "none";
    }
  </script>


@endsection
