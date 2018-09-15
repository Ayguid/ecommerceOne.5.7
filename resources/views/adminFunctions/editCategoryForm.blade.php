@extends('layouts.app')


@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit Category</div>

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

              {{-- {{dd($category)}} --}}

              @isset($category)


              <form id="addCategoriesForm" class="addCategoriesForm" action="{{route('admin.updateCategory')}}" method="post" >
                {{ csrf_field() }}
                <input type="text" class="form-control {{ $errors->has('product_category_description') ? ' is-invalid' : '' }}"  name="product_category_description" value="{{$category->product_category_description}}" placeholder="Add Category">
                <input type="text" name="category_id" value="{{$category->id}}" hidden>
                @if ($errors->has('product_category_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_category_description') }}</strong>
                    </span>
                @endif

                <input type="submit" name="" value="Submit">
              </form>
              @endisset
              <a href="{{route('admin.showCategories')}}">Back to Categories</a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>






@endsection
