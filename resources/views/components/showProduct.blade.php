
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="showcase">

                      {{-- Product Data --}}
{{-- ver diff entre los dos for each --}}
                      @foreach ($product->getFillable() as $value)
                      {{-- @foreach ($product->getAttributes() as $value) --}}
                        {{$value}} :
                        {{$product->$value}}<br>
                      @endforeach

                      @foreach ($product->images as  $image)
                        <img width="25%;" src="{{asset('storage/uploads/Product_Photo/'.$image->image_path)}}" alt="">
                      @endforeach

                      @if (!$product->images->first())
                        <img width="25%;" src="{{asset('storage/uploads/Product_Photo/default-product.jpg')}}" alt=""><br>
                      @endif
                      <br>
 {{-- {{dd($product)}} --}}









                      <a href="{{route('productListing')}}">Back to Products</a>
                      <br>





                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
