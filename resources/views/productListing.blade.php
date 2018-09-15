@extends('layouts.app')

@section('content')
    <div class="navbar navbar-expand-lg categories-menu top-btm-nav-styles">
        @isset($data['categories'])
            @component('components.categoriesMenu',  ['data'=>$data['categories']])
            @endcomponent
        @endisset
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="showcase">
                      @component('components.who')
                      @endcomponent
                    </div>

                    <div class="showcase">

                      {{-- Categories filter --}}
                      <div class="">
                        @foreach (App\Ref_Product_Category::all() as $key => $category)
                          <a class="border-bottom border-dark" href="{{route('productListing', $category->product_category_code)}}">{{$category->product_category_description}}</a>&nbsp; &nbsp;
                        @endforeach
                        <a class="border-bottom border-dark" href="{{route('productListing')}}">All Products</a>
                      </div>
                      <br>




                      @component('components.productsDisplay', ['products' =>$products])
                      @endcomponent
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
