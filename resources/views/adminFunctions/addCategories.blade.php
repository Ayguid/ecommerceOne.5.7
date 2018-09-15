@extends('layouts.app')


@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Add/Edit Category</div>

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
              @isset($categories)
                <ul>
                  @foreach ($categories as $key => $category)
                    <li>{{$category->product_category_description}}&nbsp &nbsp<a href="{{route('admin.showCategoryForm', $category->id)}}">edit</a></li>
                  @endforeach
                  <br>
                  <br>
                  <a id="showAddCategory" href="#"></a>
                </ul>

              @endisset


              <form id="addCategoriesForm" class="addCategoriesForm" action="{{route('admin.saveCategory')}}" method="post" hidden>
                {{ csrf_field() }}
                <input type="text" class="form-control {{ $errors->has('product_category_description') ? ' is-invalid' : '' }}"  name="product_category_description" value="" placeholder="Add Category">
                @if ($errors->has('product_category_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_category_description') }}</strong>
                    </span>
                @endif

                <input type="submit" name="" value="Submit">
              </form>

              <a href="{{route('admin.dashboard')}}">Back to Dashboard</a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>





{{-- FIX Toggle hidden & show form --}}
<script type="text/javascript">
window.onload = function() {
  var button = document.getElementById("showAddCategory");
  buttonText = "Add Category";
  button.innerHTML=buttonText;
  button.addEventListener("click", function(){
  var form = document.getElementById("addCategoriesForm");
    if (form.hidden===false) {
      form.hidden=true;
      this.innerHTML=buttonText;
    }
    else {
      this.innerHTML="Hide";
      form.hidden=false;
    }
  });
}
</script>

@endsection
