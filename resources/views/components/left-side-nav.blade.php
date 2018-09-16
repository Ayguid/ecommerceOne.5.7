
<style>
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>





<form action="{{route('filter')}}" method="get" >
  <label for="search">Search By name</label><br>
  <input type="text" name="product_name" value="" placeholder="Search.."><br>
  <br>
<p>By Category</p>
@foreach (App\Ref_Product_Category::all() as $category)
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="product_category_code[]" value="{{$category->product_category_code}}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{$category->product_category_description}}
  </label>
</div>
@endforeach
<br>
<p>By Brand</p>
@foreach (App\Ref_Product_Brand::all() as $brand)
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="product_brand_code[]" value="{{$brand->product_brand_code}}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {{$brand->product_brand_name}}
  </label>
</div>
@endforeach



  <input type="submit" name="" value="Apply">
</form>
<br>
<br>
