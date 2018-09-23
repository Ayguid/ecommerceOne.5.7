<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//user logged in


// Route::get('/cart/clear','CartController@clear')->name('cart.clear');
// Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
// Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
// Route::get('/cart/details','CartController@details')->name('cart.details');
// Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');

// Route::group(['prefix' => 'wishlist'],function()
// {
//     Route::get('/','WishListController@index')->name('wishlist.index');
//     Route::post('/','WishListController@add')->name('wishlist.add');
//     Route::get('/details','WishListController@details')->name('wishlist.details');
//     Route::delete('/{id}','WishListController@delete')->name('wishlist.delete');
// });






// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'WelcomeController@index');

// view helper controller
Route::get('/', 'ViewHelperController@index')->name('landing');
Route::get('/category/{category?}', 'ViewHelperController@index')->name('indexProducts');
Route::get('/product/{id}', 'ViewHelperController@index')->name('showProduct');
Route::get('/filter', 'ViewHelperController@filter')->name('filter');




//cart stuff controller
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::post('/cart/remove','CartController@remove')->name('cart.remove');






//creates auth routes for users
Auth::routes(['verify' => true]);


//user logged in
Route::get('/account', 'UserAccountController@index')->name('account');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//order
Route::get('/users/show-order-data', 'User_Order_Controller@showOrderData')->name('order-data');
// address related
Route::post('/users/show-order-data', 'PremiseController@saveAddress')->name('saveAddress');
//order to database
Route::post('/saveOrder', 'User_Order_Controller@cartToOrder')->name('cartToOrder');
Route::post('/orders', 'User_Order_Controller@deleteOrder')->name('deleteOrder');
//
// //user orders
Route::get('/orders', 'User_Order_Controller@showOrders')->name('showOrders');
//
//

Route::post('/mercadoPago', 'MercadoPagoController@mercadoPago')->name('mercadoPago');





//admin prefix
Route::prefix('admin')->group(function()
{
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  //  Password reset Route
  Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  //add admin Controller show stuff only




  //product
  Route::get('addProduct', 'ProductController@showAddProductsForm')->name('admin.addProducts');
  Route::post('saveProduct/', 'ProductController@saveProduct')->name('admin.saveProduct');

  Route::get('editProduct/{id?}', 'ProductController@showEditProductsForm')->name('admin.showEditProductForm');

  Route::post('editProduct', 'ProductController@update')->name('admin.updateProduct');


//category
  Route::get('showCategories', 'Ref_Product_Category_Controller@showCategories')->name('admin.showCategories');
  Route::post('addCategories/', 'Ref_Product_Category_Controller@saveCategory')->name('admin.saveCategory');
  Route::post('editCategory/', 'Ref_Product_Category_Controller@updateCategory')->name('admin.updateCategory');

  // Route::post('updateCategory/', 'Ref_Product_Category_Controller@update')->name('admin.updateCategory');



//brand
  Route::get('brands', 'Ref_Product_Brand_Controller@showBrands')->name('admin.showBrands');
  Route::post('addBrand/', 'Ref_Product_Brand_Controller@saveBrand')->name('admin.saveBrand');
  // Route::get('showBrandForm/{id}', 'Ref_Product_Brand_Controller@showBrandForm')->name('admin.showBrandForm');

  //individual objects controllers save updates and stuff
});
