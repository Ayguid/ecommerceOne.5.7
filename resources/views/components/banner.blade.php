{{-- {{dd($data['products']->count())}} --}}



@foreach ($products as $key => $product)
  <div id="{{$product->id}}" class="product" >


    <a  href="{{route('showProduct', $product->id)}}">{{$product->product_name}}</a>
    @if ($product->price !== $product->discountPrice())
      Discount Price: {{$product->discountPrice()}}
    @else
      Price: {{$product->price}}
    @endif

    @isset($product->images)
      @foreach ($product->images as $image)
        <img width="15%"  src="{{asset('storage/uploads/Product_Photo/'.$image->image_path)}}" alt="">
      @endforeach
      @if(!$product->images->first())
        <img   src="{{asset('storage/uploads/Product_Photo/default-product.jpg')}}" alt="">
      @endif
    @endisset


    <form id="addToCartForm" class="addToCartForm" method="POST" action="{{route('cart.add')}}">
      {{ csrf_field() }}
      <input class="product_id" type="hidden" name="product_id" value="{{$product->id}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


      <div class="input-group mb-3 ">

        <button type="submit" class=" addToCartSubmit btn btn-fefault add-to-cart">
          <i class="fa fa-shopping-cart"></i>
          Add to cart
        </button>
        <input class="form-control col-1" type="number" name="quantity" min="1" value="1" >

      </div>
    </form>

  </div>

@endforeach


@if($products->count() > 1)

  {{ $products->links() }}
  {{-- {{ $products->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}

@endif

<script type="text/javascript" src="{{asset('js/cartFunctions.js')}}"></script>
