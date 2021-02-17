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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/admin/products','Admin\ProductsController');
Route::resource('/admin/categories','Admin\CategoriesController');
//Route::get('/admin/products','Admin\ProductsController@index');
//Route::get('/admin/products/edit/{id}','Admin\ProductsController@edit')->name('product.edit');
