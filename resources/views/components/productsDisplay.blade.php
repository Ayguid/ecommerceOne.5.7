{{-- {{dd($products)}} --}}

<div class="">


  @isset($products)

    @foreach ($products as $key => $product)
      <div class="bg-light">



      <br>

      {{-- Product Name: <a  href="{{route('showProduct', $product->id)}}">{{$product->product_name}}</a> &nbsp &nbsp --}}
      Product Name: <a  href="#">{{$product->product_name}}</a> &nbsp &nbsp
      {{-- <form method="POST" action="{{route('addToCart')}}">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-fefault add-to-cart">
          <i class="fa fa-shopping-cart"></i>
          Add to cart
        </button>
      </form> --}}
<br>
      Category: {{$product->category->product_category_description}}<br>
      Brand: {{$product->brand->product_brand_name}}<br>
      Product Details: {{$product->other_product_details}}<br>


      @if (($product->discountPrice() !== $product->price) )
          Discount Price: {{$product->discountPrice()}}<br>
        @else
          Price: {{$product->price}}<br>
      @endif


      {{-- corregir --}}
      @isset($product->stock->quantity)
        Stock: {{$product->stock->quantity}}
      @else
        Stock: 0
      @endisset
      <br>
      {{--  --}}


      {{-- corregir --}}
      @isset($product->images)
        @foreach ($product->images as $image)
          <img width="25%;" src="{{asset('storage/uploads/Product_Photo/'.$image->image_path)}}" alt="">
        @endforeach<br>
        @if(!$product->images->first())
          <img width="25%;" src="{{asset('storage/uploads/Product_Photo/default-product.jpg')}}" alt=""><br>
        @endif
      @endisset


      {{--  --}}

      @if (Auth::guard('admin')->check())
        <a href="{{route('admin.editProduct', $product->id)}}">Edit Product</a>
      @endif

    </div>
    <br><br>

  @endforeach

  {{-- {{ $products->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}
  {{ $products->links() }}
@endisset




</div>
