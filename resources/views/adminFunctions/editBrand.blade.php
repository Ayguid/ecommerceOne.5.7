@extends('layouts.app')


@section('content')








  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Add Brand</div>

          <div class="card-body">
            @if(Session::has('alert-success'))
              <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
            @endif
            @if(Session::has('alert-danger'))
              <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
            @endif


            <div class="showcase">


              <form id="addBrandsForm" class="addBrandsForm" action="{{route('admin.saveBrand')}}" method="post" hidden>
                {{ csrf_field() }}
                {{-- <input type="text" class="form-control {{ $errors->has('product_brand_name') ? ' is-invalid' : '' }}"  name="product_brand_name" value="" placeholder="Add Brand">
                @if ($errors->has('product_brand_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_brand_name') }}</strong>
                    </span>
                @endif --}}

                <input type="submit" name="" value="Submit">
              </form>
              <a href="{{route('admin.saveBrand')}}">Back to Brands</a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>







@endsection
