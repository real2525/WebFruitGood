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


//Frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@tim_kiem');

//danh muc sản phẩm
Route::get('/danh-muc-san-pham/{category_id}','App\Http\Controllers\CategoryProduct@show_category_home');
//danh mục thương hiệu
Route::get('/thuong-hieu-san-pham/{brand_id}','App\Http\Controllers\BrandProduct@show_brand_home');
//chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\Product@chi_tiet');
//Backend
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');

Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');


Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');
Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');

Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');


Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product');
Route::post('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');

Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product');

//Product
Route::get('/add-product','App\Http\Controllers\Product@add_product');
Route::get('/all-product','App\Http\Controllers\Product@all_product');

Route::get('/edit-product/{product_id}','App\Http\Controllers\Product@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\Product@delete_product');


Route::get('/unactive-product/{product_id}','App\Http\Controllers\Product@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\Product@active_product');
Route::post('/save-product','App\Http\Controllers\Product@save_product');

Route::post('/update-product/{product_id}','App\Http\Controllers\Product@update_product');

//cart
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::get('/show-cart/','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-cart/{rowId}','App\Http\Controllers\CartController@delete_cart');

//checkpout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/register-checkout','App\Http\Controllers\CheckoutController@register_checkout');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-checkout','App\Http\Controllers\CheckoutController@save_checkout');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');


//payment
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');


//order
Route::get('/manage-order','App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view-order/{orderId}','App\Http\Controllers\CheckoutController@view_order');
Route::get('/delete-order/{orderId}','App\Http\Controllers\CheckoutController@delete_order');



