<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <script src="{{ asset('js/app.js') }}" ></script>



  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Fonts -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


  <!-- Styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('styles/ecommerceStyle1.css') }}" rel="stylesheet">
</head>





<body id="body">

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name') }}
      </a>
      {{-- <div class="">
      @foreach (App\Ref_Product_Category::all() as $key => $value)
      <a class="border-bottom border-dark" href="{{route('filterByCategory', $value->product_category_code)}}">{{$value->product_category_description}}</a>&nbsp; &nbsp;
    @endforeach
    <a class="border-bottom border-dark" href="{{route('productListing')}}">All Products</a>
  </div> --}}
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">

    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>

          </a>

          <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
            <a  class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <a class="dropdown-item"  href="{{route('account')}}">My Account</a>

          @if (Auth::guard('admin')->check())
            <a class="dropdown-item"  href="{{route('admin.dashboard')}}">Admin Dashboard</a>
            <a class="dropdown-item" href="{{route('admin.logout')}}"><strong> Admin Log Out</strong></a>
          @endif


          {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> --}}
          <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
            @csrf
          </form>
        </div>
      </li>

    @endguest




    <li class="nav-item nav-link"><a href="{{route('cart.index')}}"><i class=" fa fa-shopping-cart" aria-hidden="true"><div id="cartCount" class="">{{Cart::getTotalQuantity()}}</div> </i></a> </li>

  </ul>
</div>
</div>

</nav>


{{-- <li class="nav-item dropdown">
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item"  href="{{route('account')}}">My Account</a>
</div>
</li> --}}
<div id="masterContainer" class="masterContainer">

  @yield('content')



</div>

<div class="footer">
  @include('components.footer')
</div>






</body>
</html>
