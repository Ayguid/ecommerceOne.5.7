<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\On_Sale;


class WelcomeController extends Controller
{



  public function index()
  {
    // $productsOnSale = Product::limit(On_Sale::count())->get();
    $productsOnSale = On_Sale::get();
    return view ('welcome')->with( 'productsOnSale', $productsOnSale);
  }









}
