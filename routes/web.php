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

Route::middleware(['auth'])->group(function () {
    Route::get('/products/add', 'App\Http\Controllers\ProductController@addProduct');
    Route::post('/product/create', 'App\Http\Controllers\ProductController@create')->name('create_product');
    Route::get('/', 'App\Http\Controllers\ProductController@index')->name('index');
    Route::get('/edit/{id}', 'App\Http\Controllers\ProductController@edit');
    Route::put('/update/{id}', 'App\Http\Controllers\ProductController@update');
    Route::delete('/products/{id}', 'App\Http\Controllers\ProductController@delete');
});

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login', 'App\Http\Controllers\LoginController@login');
Route::get('logout', '\App\Http\Controllers\LoginController@logout')->name('logout');
