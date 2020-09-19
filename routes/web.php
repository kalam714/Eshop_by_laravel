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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/cart', 'ClientController@cart');
Route::get('/checkout', 'ClientController@checkout');
Route::get('/login','ClientController@login');
Route::get('/signup','ClientController@signup');
Route::post('/createaccount','ClientController@createaccount');
Route::post('/accessaccount','ClientController@accessaccount');

Route::get('/admin','AdminController@dashboard');
Route::get('/orders','AdminController@orders');


Route::get('/addcategory','CategoryController@addCategory');
Route::post('/addcategory','CategoryController@savecategory');
Route::get('/categories','CategoryController@categories');
Route::get('/edit/{id}', 'CategoryController@edit');
Route::post('/updatecategory', 'CategoryController@updatecategory');
Route::get('/delete/{id}', 'CategoryController@delete');
Route::get('/view_by_cat/{name}','CategoryController@view_by_cat');




Route::get('/addproduct','ProductController@addProduct');
Route::get('/product','ProductController@product');
Route::post('/addproduct','ProductController@saveproduct');
Route::get('/editProduct/{id}','ProductController@editProduct');
Route::post('/updateproduct','ProductController@updateproduct');
Route::get('/deleteProduct/{id}','ProductController@deleteProduct');
Route::get('/active/{id}','ProductController@active');
Route::get('/unactive/{id}','ProductController@unactive');
Route::get('/addToCart/{id}','ProductController@addToCart');

Route::get('/slider','SliderController@slider');
Route::get('/addslider','SliderController@addSlider');
Route::post('/addslider','SliderController@saveslider');
Route::get('/deleteslider/{id}','SliderController@deleteslider');
Route::get('/active/{id}','SliderController@active');
Route::get('/unactive/{id}','SliderController@unactive');


