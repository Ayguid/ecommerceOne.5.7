@extends('layouts.app')

@section('content')







<div class="categoriesMenu">

@component('components.categoriesMenu')
@endcomponent

</div>




<div id="leftNav" class="leftNav ">

  @if (session('status'))
  <div class="alert alert-success" role="alert">
  {{ session('status') }}
  </div>
  @endif
  
@include('components.left-side-nav')
</div>

<div class="banner">
@include('components.banner',  ['products'=>$data['products']] )
</div>






@endsection
