@extends('layouts.app')


@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit Product</div>

          <div class="card-body">
            @if(Session::has('alert-success'))
              <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
            @endif
            @if(Session::has('alert-danger'))
              <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
            @endif
            {{-- @if($errors->any())
            <h4>{{$errors->first()}}</h4>
          @endif --}}

          <div class="showcase">
            <form id="addProductForm" class="addProduct-form" action="{{route('admin.updateProduct', $data['product']->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}


              <div class="form-group">
                <label for="product_category">Product Category</label>
                <select class="form-control" id="product_category" aria-describedby="product_category" name="product_category" placeholder="Product Category" >
                  @foreach ($data['categories'] as $key => $value)
                    <option value="{{$value->product_category_code}}" {{($value->product_category_code == $data['product']->product_category_code) ? 'selected':'' }} >{{$value->product_category_description}}</option>
                  @endforeach
                </select>
              </div>


              <div class="form-group">
                <label for="product_brand">Product Brand</label>
                <select  class="form-control" id="product_brand" name="product_brand" placeholder="Product Brand">
                  @foreach ($data['brands'] as $key => $value)
                    <option value="{{$value->product_brand_code}}" {{$value->product_brand_code == $data['product']->product_brand_code ? 'selected':''}} >{{$value->product_brand_name}}</option>
                  @endforeach


                </select>
              </div>

              <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control {{ $errors->has('product_name') ? ' is-invalid' : '' }}" id="product_name" name="product_name" placeholder="Product Name" value="{{ $data['product']->product_name }}" >
                @if ($errors->has('product_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('product_name') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="other_product_details">Product Details</label>
                <textarea class="form-control {{ $errors->has('other_product_details') ? ' is-invalid' : '' }}" id="other_product_details" name="other_product_details" rows="3">{{ $data['product']->other_product_details }}</textarea>
                @if ($errors->has('other_product_details'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('other_product_details') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" name="price" placeholder="Price" value="{{ $data['product']->price}}" >
                @if ($errors->has('price'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <input type="file" name="images[]" class="form-control {{ $errors->has('images.0') ? ' is-invalid' : '' }}"   multiple >
                @if ($errors->has('images.0'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('images.0') }}</strong>
                  </span>
                @endif
              </div>

              <input   type="submit" value="submit" class="btn btn-primary">
            </form>
          </div>


          <a href="{{route('admin.dashboard')}}">Back to DashBoard</a>
        </div>
      </div>

    </div>

  </div>

</div>



<script type="text/javascript">
window.onload = function() {

  document.getElementById("addProductForm").addEventListener("submit", function(event){

    var $fileUpload = this['images[]'].files;
    // console.log($fileUpload);
    if (parseInt($fileUpload.length) > 3){
      swal("You are only allowed to upload a maximum of 3 files");
      event.preventDefault();
      return;
    }
    this.submit();
  });
}
</script>

@endsection
