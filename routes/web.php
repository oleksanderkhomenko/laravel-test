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

Route::get('/', 'GuestViewController@viewAll');
Route::post('/', 'GuestViewController@searchProducts');
Route::get('/category/{id}', 'GuestViewController@viewCategory');
Route::get('/product/{id}', 'GuestViewController@viewProduct');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Categories
Route::get('/categories', 'CategoryController@viewAll');
Route::get('/categories/new', 'CategoryController@new');
Route::post('/categories/new', 'CategoryController@save');
Route::post('/category/delete/{id}', 'CategoryController@delete');
Route::get('/category/edit/{id}', 'CategoryController@edit');
Route::post('/category/edit/{id}', 'CategoryController@update');

// Products
Route::get('/products/{id}', 'ProductController@categoryProducts');
Route::get('/products/new/{id}', 'ProductController@new');
Route::post('/products/new/{id}', 'ProductController@save');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/edit/{id}', 'ProductController@update');
Route::post('/product/delete/{id}', 'ProductController@delete');
