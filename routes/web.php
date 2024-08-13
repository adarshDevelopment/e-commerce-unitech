<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['prefix'=>'frontend', 'as'=>'frontend.'],function(){
    Route::get('/add_to_compare/{product_slug}', [App\Http\Controllers\Frontend\ComparisonController::class, 'addToCompare'])->name('add_to_compare');
    Route::get('/remove_item_from_compare/{product_slug}', [App\Http\Controllers\Frontend\ComparisonController::class, 'removeItem'])->name('remove_item_from_compare');
    Route::get('/view_compare_items', [App\Http\Controllers\Frontend\ComparisonController::class, 'index'])->name('view_compare_items');
});

//grouped route with customer middleware to only let customer purchase items
Route::group(['middleware' => 'customerAuth'], function() {
    Route::get('/customer_test', function (){
        return "demo";
    });
    Route::get('/cart/checkout', [App\Http\Controllers\Frontend\CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/make_order', [App\Http\Controllers\Frontend\CartController::class, 'makeOrder'])->name('cart.checkout.make_order');
    Route::get('customer/dashboard', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('customer.home');
    //view customer's order history
    Route::get('customer/orders', [App\Http\Controllers\Customer\HomeController::class, 'viewOrder'])->name('frontend.customer.orders');
    Route::get('customer/orders/{order_id}', [App\Http\Controllers\Customer\HomeController::class, 'showOrder'])->name('frontend.customer.orders.show');

    Route::get('customer/edit_info', [App\Http\Controllers\Customer\HomeController::class, 'editCustomerInfo'])->name('frontend.customer.edit_info');
    Route::put('customer/update_info', [App\Http\Controllers\Customer\HomeController::class, 'updateCustomerInfo'])->name('frontend.customer.update_info');

    Route::get('customer/edit_pass', [App\Http\Controllers\Customer\HomeController::class, 'editPass'])->name('frontend.customer.edit_pass');
    Route::put('customer/update_pass', [App\Http\Controllers\Customer\HomeController::class, 'updatePass'])->name('frontend.customer.update_pass');


    Route::post('/customer/post_comment', [App\Http\Controllers\Frontend\FrontendController::class, 'postComment'])->name('customer.post_comment');

});

Route::prefix('/customer')->name('customer.')->group(function(){
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        Route::get('/login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Customer\Auth\LoginController::class, 'login'])->name('login');
        Route::post('/logout', [App\Http\Controllers\Customer\Auth\LoginController::class, 'logout'])->name('logout');
        Route::get('/register', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'showRegisterForm'])->name('register.create');
        Route::post('/register', [App\Http\Controllers\Customer\Auth\RegisterController::class, 'register'])->name('login.store');

    });


//    Route::get('/dashboard','HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');

    //Put all of your admin routes here...

});

Auth::routes();
            #disable register
//Auth::routes(['register' => false]);

Route::post('/frontend/product/get_price', [App\Http\Controllers\Frontend\FrontendController::class, 'getPrice'])->name('frontend.product.get_price');

Route::get('/price',function(){
    return view('frontend.subcategory');
});

//route to store products to cart
Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart.index');
Route::get('/cart/delete/{row_id}', [App\Http\Controllers\Frontend\CartController::class, 'deleteRow'])->name('cart.delete');

Route::post('/cart/update', [App\Http\Controllers\Frontend\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/add', [App\Http\Controllers\Frontend\CartController::class, 'add'])->name('frontend.cart.add');
//Route::post('/cart/make_order', [App\Http\Controllers\Frontend\CartController::class, 'makeOrder'])->name('frontend.cart.make_order');

//search route
Route::get('/search', [App\Http\Controllers\Frontend\FrontendController::class, 'searchItems'])->name('frontend.search');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'category'])->name('frontend.category');

Route::get('/subcategory/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'subcategory'])->name('frontend.subcategory');

Route::get('/product/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'product'])
    ->name('frontend.product');

Route::get('/subcategory/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'subcategory'])->name('frontend.subcategory');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


