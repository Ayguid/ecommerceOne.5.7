<?php
/**
* Created by PhpStorm.
* User: darryl
* Date: 4/30/2017
* Time: 10:58 AM
*/

namespace App\Http\Controllers;


// use Darryldecode\Cart\CartCondition;
// use Darryldecode\Cart;
// use Darryldecode\Cart;


use App\Product;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CartController extends Controller
{

  public function index()
  {
    $cart= \Cart::getContent();
    return view('cart')->with('cart', $cart);
  }






  public function add(Request $request)
  {
    $quantity=1;

    if ($request->quantity > 1) {
      $quantity=$request->quantity;
    }
    // dd($request->quantity);

    $product=Product::find($request->product_id);
        \Cart::add(array(
        'id' => $product->id,
        'name' => $product->product_name,
        'price' => $product->price,
        'quantity' => $quantity,
        'attributes' => array()
    ));
    return \Cart::getContent();
  }






  public function remove(Request $request)
  {

    if($request->product_id){
      \Cart::remove($request->product_id);
    }
    else{
      \Cart::clear();
    }

    $cart= \Cart::getContent();
    return view('cart')->with('cart', $cart);
  }








  // public function add()
  // {
  //     $userId = 1; // get this from session or wherever it came from
  //
  //     $id = request('id');
  //     $name = request('name');
  //     $price = request('price');
  //     $qty = request('qty');
  //
  //     $customAttributes = [
  //         'color_attr' => [
  //             'label' => 'red',
  //             'price' => 10.00,
  //         ],
  //         'size_attr' => [
  //             'label' => 'xxl',
  //             'price' => 15.00,
  //         ]
  //     ];
  //
  //     $item = \Cart::session($userId)->add($id, $name, $price, $qty, $customAttributes);
  //
  //     return response(array(
  //         'success' => true,
  //         'data' => $item,
  //         'message' => "item added."
  //     ),201,[]);
  // }



  public function addCondition()
  {
    $userId = 1; // get this from session or wherever it came from

    /** @var \Illuminate\Validation\Validator $v */
    $v = validator(request()->all(),[
      'name' => 'required|string',
      'type' => 'required|string',
      'target' => 'required|string',
      'value' => 'required|string',
    ]);

    if($v->fails())
    {
      return response(array(
        'success' => false,
        'data' => [],
        'message' => $v->errors()->first()
      ),400,[]);
    }

    $name = request('name');
    $type = request('type');
    $target = request('target');
    $value = request('value');

    $cartCondition = new CartCondition([
      'name' => $name,
      'type' => $type,
      'target' => $target, // this condition will be applied to cart's subtotal when getSubTotal() is called.
      'value' => $value,
      'attributes' => array()
    ]);

    \Cart::session($userId)->condition($cartCondition);

    return response(array(
      'success' => true,
      'data' => $cartCondition,
      'message' => "condition added."
    ),201,[]);
  }

  public function clearCartConditions()
  {
    $userId = 1; // get this from session or wherever it came from

    \Cart::session($userId)->clearCartConditions();

    return response(array(
      'success' => true,
      'data' => [],
      'message' => "cart conditions cleared."
    ),200,[]);
  }

  public function delete($id)
  {
    $userId = 1; // get this from session or wherever it came from

    \Cart::session($userId)->remove($id);

    return response(array(
      'success' => true,
      'data' => $id,
      'message' => "cart item {$id} removed."
    ),200,[]);
  }

  public function details()
  {
    $userId = 1; // get this from session or wherever it came from

    // get subtotal applied condition amount
    $conditions = \Cart::session($userId)->getConditions();


    // get conditions that are applied to cart sub totals
    $subTotalConditions = $conditions->filter(function (CartCondition $condition) {
      return $condition->getTarget() == 'subtotal';
    })->map(function(CartCondition $c) use ($userId) {
      return [
        'name' => $c->getName(),
        'type' => $c->getType(),
        'target' => $c->getTarget(),
        'value' => $c->getValue(),
      ];
    });

    // get conditions that are applied to cart totals
    $totalConditions = $conditions->filter(function (CartCondition $condition) {
      return $condition->getTarget() == 'total';
    })->map(function(CartCondition $c) {
      return [
        'name' => $c->getName(),
        'type' => $c->getType(),
        'target' => $c->getTarget(),
        'value' => $c->getValue(),
      ];
    });

    return response(array(
      'success' => true,
      'data' => array(
        'total_quantity' => \Cart::session($userId)->getTotalQuantity(),
        'sub_total' => \Cart::session($userId)->getSubTotal(),
        'total' => \Cart::session($userId)->getTotal(),
        'cart_sub_total_conditions_count' => $subTotalConditions->count(),
        'cart_total_conditions_count' => $totalConditions->count(),
      ),
      'message' => "Get cart details success."
    ),200,[]);
  }
}
