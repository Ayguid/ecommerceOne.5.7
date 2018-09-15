@extends('layouts.app')

@section('content')





  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

  @if(Session::has('alert-success'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
  @endif
  @if(Session::has('alert-danger'))
    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
  @endif



  <div class="orderDataCart">
      @if(count($data['cart']))
        <table class="order">
          <thead>
            <tr class="cart_menu">
              <td class="image">Image</td>
              <td class="description">Item</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
            </tr>
          </thead>
          <tbody>
            @foreach($data['cart'] as $item)
              <tr>

                {{-- {{dd($item)}} --}}
                <td class="cart_product">
                  <a href=""><img src="images/cart/one.png" alt=""></a>
                </td>
                <td class="cart_description">
                <a  href="{{route('showProduct', $item->id)}}">{{$item->name}}</a>
                  <p>Web ID: {{$item->id}}</p>
                </td>
                <td class="cart_price">
                  <p>${{$item->price}}</p>

                </td>
                <td class="cart_quantity">
                  <div class="cart_quantity_button">
                    {{-- <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2"> --}}
                    <p>{{$item->qty}}</p>
                  </div>
                </td>
                <td class="cart_total">
                  <p class="cart_total_price">${{$item->subtotal}}</p>
                </td>

              </tr>
            @endforeach
            <tr>
<td>

            <p>
              Order Total <span>${{Cart::total()}}</span>
            </p>
          </td>
          </tr>
          @endif
        </tbody>
      </table>

  </div>



  <div class="userAddresses">
    {{-- {{$data['user']->addresses}} --}}
<button id="showAddressForm" class="centerBlockTranslate" type="text" name="addAddress">Add New Address</button>


  <div id="addressForm" class="addressForm" hidden >
    <form class="" action="{{route('saveAddress')}}" method="post">
      {{ csrf_field() }}

      <fieldset>
        <!-- Address form -->
        <div class="form-group">
          <label class="control-label">Phone number</label>
          <div class="controls">
            <input id="phone" name="phone" type="text" placeholder="Phone"
            class="form-control  {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}">
            @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <div class="form-group">
          <label class="control-label" for="address_type_code">Address Type</label>
          <select id="address_type_code" class="form-control" name="address_type_code">
            @isset($data)
              @foreach (App\Ref_Address_Type::all() as $key => $value)
                <option value="{{$value->address_type_code}}" {{(collect(old('address_type_code'))->contains($value->address_type_code)) ? 'selected':'' }}>{{$value->address_type_description}}</option>
              @endforeach

            @endisset

          </select>
        </div>
        <!-- address-line1 input-->
        <div class="form-group">
          <label class="control-label">Street</label>
          <div class="controls ">
            <input id="street" name="street" type="text" placeholder="Only street name"
            class="form-control {{ $errors->has('street') ? ' is-invalid' : '' }}" value="{{ old('street') }}">
            @if ($errors->has('street'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('street') }}</strong>
              </span>
            @endif
          </div>

        </div>



        <!-- address-line2 input-->
        <div class="form-group">
          <label class="control-label">Address number</label>
          <div class="controls">
            <input id="number" name="number" type="text" placeholder="Address Number"
            class="form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" value="{{ old('number') }}">
            <p class="help-block">House number, Building number , etc.</p>
            @if ($errors->has('number'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('number') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <div class="form-group">
          <label class="control-label">Apartment</label>
          <div class="controls">
            <input id="apartment" name="apartment" type="text" placeholder="Apartment Number"
            class="form-control {{ $errors->has('apartment') ? ' is-invalid' : '' }}" value="{{ old('apartment') }}">
            <p class="help-block">Apartment, suite , unit, floor, etc.</p>
            @if ($errors->has('apartment'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('apartment') }}</strong>
              </span>
            @endif
          </div>
        </div>



        <!-- city input-->
        <div class="form-group">
          <label class="control-label">City / Town</label>
          <div class="controls">
            <input id="city" name="city" type="text" placeholder="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}">
            <p class="help-block"></p>
            @if ($errors->has('city'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('city') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <!-- region input-->
        <div class="form-group">
          <label class="control-label">State / Province / Region</label>
          <div class="controls">
            <input id="state" name="state" type="text" placeholder="state / province / region"
            class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ old('state') }}">
            <p class="help-block"></p>
            @if ($errors->has('state'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('state') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <!-- postal-code input-->
        <div class="form-group">
          <label class="control-label">Zip / Postal Code</label>
          <div class="controls">
            <input id="postal_code" name="postal_code" type="text" placeholder="zip or postal code"
            class="form-control {{ $errors->has('postal_code') ? ' is-invalid' : '' }}" value="{{ old('postal_code') }}">
            <p class="help-block"></p>
            @if ($errors->has('postal_code'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('postal_code') }}</strong>
              </span>
            @endif
          </div>
        </div>
        {{-- {{old('country')}} --}}
        <!-- country select -->
        <div class="form-group">
          <label class="control-label">Country</label>
          <div class="controls">
            <select id="country" name="country" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" >
              <option value="" selected="selected">(please select a country)</option>
              <option value="AR">Argentina</option>
              <option value="CL">Chile</option>
              <option value="UY">Uruguay</option>

            </select>
            @if ($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <input class="btn btn-primary" type="submit" name="" value="submit">
      </form>

  </div>





<form id="addressOptions" class="" action="{{route('cartToOrder')}}" method="post">
{{ csrf_field() }}

    <div class="billingAddress">

        <table class="">
          <thead>
            <tr class="">
              <td class="">  <p> Choose your Billing Address</p></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              <strong>  In Store Payment</strong>
              {{-- {{$address->premise->addressPretty()}} --}}
            </td>
              <td>
                <input checked class="" type="radio" name="billing_premise_id" value="" >
              </td>
            </tr>
            @foreach ($data['user']->addresses as $key => $address)

              @if ($address->addressType->address_type_code == 1)


              <tr>

                {{-- {{dd($item)}} --}}
                <td class="">
                  {{$address->premise->addressPretty()}}
                </td>
                <td class="">
                  <input class="" type="radio" name="billing_premise_id"  value="{{$address->premise->id}}" >
                </td>

              </tr>

              @endif

            @endforeach



        </tbody>
      </table>
    </div>


    <div class="shippingAddress">

        <table class="">
          <thead>
            <tr class="">
              <td class="">  <p> Choose your Shipping Address</p></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              <strong>  Pick Up in Store</strong>
              {{-- {{$address->premise->addressPretty()}} --}}
            </td>
              <td>
                <input checked class="" type="radio" name="shipping_premise_id" value="" >
              </td>
            </tr>

            @foreach ($data['user']->addresses as $key => $address)

              @if ($address->addressType->address_type_code == 2)


              <tr>

                {{-- {{dd($item)}} --}}
                <td class="">
                  {{$address->premise->addressPretty()}}
                </td>
                <td class="">
                  <input class="" type="radio" name="shipping_premise_id"  value="{{$address->premise->id}}" >
                </td>

              </tr>

              @endif

            @endforeach



        </tbody>
      </table>
    </div>
    <input type="submit" name="" value="Continue">
  </form>



    <div class="clearfix"></div>



  </div>



<script type="text/javascript">

var showAddressForm = document.getElementById("showAddressForm");
showAddressForm.addEventListener("click", function(){
  var addressForm = document.getElementById("addressForm");
  if (addressForm.hidden === false) {
       addressForm.hidden = true;
       showAddressForm.innerHTML= 'Add New Address';

   } else {
       addressForm.hidden = false;
       showAddressForm.innerHTML= 'Hide';
   }
 });

</script>









    {{-- <h5>Choose your Payment Method</h5>









<div class="paymentMethods">

  @foreach (App\Ref_Payment_Method::all() as $key => $paymentMethod)
    <a href="">{{$paymentMethod->payment_method_description}}</a><br>


  @endforeach


</div>


</div> --}}












@endsection
