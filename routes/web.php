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





//version vieja
// //home guest pages
// Route::get('/', 'DisplayController@index');
// Route::get('/cart/{request?}', 'DisplayController@showCart')->name('refresh');
// Route::post('/cart', 'DisplayController@showCart')->name('addToCart');
//
//
//
// //parte sucia siguientes 5 lineas arreglar
// Route::get('/orders', 'DisplayController@showOrders')->name('showOrders');
// Route::get('/saveOrder', 'User_Order_Controller@cartToOrder')->name('cartToOrder');
// Route::get('/shipping', 'Shipping_Method_Controller@showShippingMethods')->name('shipping');
// Route::post('/shipping', 'Shipping_Method_Controller@saveAddress')->name('saveAddress');
// Route::get('/checkout', 'DisplayController@checkout')->name('checkout');
//
//
//
//
// //
// Route::get('/products', 'DisplayController@index')->name('productListing');
// Route::get('/products/category/{category}', 'DisplayController@filterByCategory')->name('filterByCategory');
// Route::get('/products/product/{product}', 'DisplayController@showProduct')->name('showProduct');
// //creates auth routes for users
// Auth::routes();
//
// //user logged in
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');



/////////

// Route::get('/checkout', 'DisplayController@checkout')->name('checkout');

// Route::get('/products', 'DisplayController@index')->name('productListing');
// Route::get('/products/product/{product}', 'DisplayController@showProduct')->name('showProduct');
// Route::post('/cart', 'DisplayController@showCart')->name('addToCart');
// Route::get('/cart/{request?}', 'DisplayController@showCart')->name('refresh');




// Route::get('/orders', 'DisplayController@showOrders')->name('showOrders');
// Route::get('/saveOrder', 'User_Order_Controller@cartToOrder')->name('cartToOrder');
// Route::get('/shipping', 'Shipping_Method_Controller@showShippingMethods')->name('shipping');
// Route::post('/shipping', 'Shipping_Method_Controller@saveAddress')->name('saveAddress');
// Route::get('/checkout', 'DisplayController@checkout')->name('checkout');




//
// Route::get('/products', 'DisplayController@index')->name('productListing');
// Route::get('/products/category/{category}', 'DisplayController@filterByCategory')->name('filterByCategory');
// Route::get('/products/product/{product}', 'DisplayController@showProduct')->name('showProduct');









// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'WelcomeController@index');

// view helper rouutes
Route::get('/', 'ViewHelperController@index')->name('landing');
Route::get('/category/{category?}', 'ViewHelperController@index')->name('indexProducts');
Route::get('/product/{id}', 'ViewHelperController@index')->name('showProduct');

//cart stuff controller
// Route::get('/cart', 'CartController@showCart')->name('showCart');
// Route::post('/cart', 'CartController@cart')->name('addToCart');

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::post('/cart/remove','CartController@remove')->name('cart.remove');
// Route::get('/cart/clear','CartController@clear')->name('cart.clear');


// Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
// Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
// Route::get('/cart/details','CartController@details')->name('cart.details');
// Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');



Route::group(['prefix' => 'wishlist'],function()
{
    Route::get('/','WishListController@index')->name('wishlist.index');
    Route::post('/','WishListController@add')->name('wishlist.add');
    Route::get('/details','WishListController@details')->name('wishlist.details');
    Route::delete('/{id}','WishListController@delete')->name('wishlist.delete');
});



//creates auth routes for users
Auth::routes(['verify' => true]);



//user logged in
Route::get('/account', 'UserAccountController@index')->name('account');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
//cart related
Route::get('/clear-cart', 'CartController@clearCart')->name('clear-cart');
Route::get('/users/show-order-data', 'User_Order_Controller@showOrderData')->name('order-data');

//address related
Route::post('/users/show-order-data', 'PremiseController@saveAddress')->name('saveAddress');

//order to database
Route::post('/saveOrder', 'User_Order_Controller@cartToOrder')->name('cartToOrder');

//user orders
Route::get('/orders', 'User_Order_Controller@showOrders')->name('showOrders');
Route::post('/orders', 'User_Order_Controller@deleteOrder')->name('deleteOrder');








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
  Route::get('addProduct', 'AdminController@showAddProductsForm')->name('admin.addProducts');
  // Route::get('editProduct/{id?}', 'AdminController@showEditProductsForm')->name('admin.editProduct');
  // Route::post('saveProduct/', 'ProductController@saveProduct')->name('admin.saveProduct');
  // Route::post('editProducts/{id}', 'ProductController@update')->name('admin.updateProduct');


//category
  Route::get('showCategories', 'AdminController@showAddCategoriesForm')->name('admin.showCategories');
  // Route::get('showCategoryForm/{id}', 'Ref_Product_Category_Controller@showCategoryForm')->name('admin.showCategoryForm');
  // Route::post('addCategories/', 'Ref_Product_Category_Controller@saveCategory')->name('admin.saveCategory');
  // Route::post('updateCategory/', 'Ref_Product_Category_Controller@update')->name('admin.updateCategory');



//brand
  Route::get('addBrands', 'AdminController@showAddBrandsForm')->name('admin.addBrands');
  // Route::get('showBrandForm/{id}', 'Ref_Product_Brand_Controller@showBrandForm')->name('admin.showBrandForm');
  // Route::post('addBrand/', 'Ref_Product_Brand_Controller@saveBrand')->name('admin.saveBrand');
  //individual objects controllers save updates and stuff
});
