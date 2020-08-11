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





// ===================  Brands ====================

Route::get('/', 'Web\AdminController@index')->name('index');
Route::get('/create', 'Web\AdminController@create')->name('create');
Route::post('/store', 'Web\AdminController@store')->name('store');
Route::get('/edit/{id}', 'Web\AdminController@edit')->name('edit');
Route::post('/update/{id}', 'Web\AdminController@update')->name('update');
Route::get('/delete/{id}', 'Web\AdminController@delete')->name('delete');

 //=================== END  =============================

 // ================== PRODUCTS ========================

Route::get('/list-products/{id}', 'Web\ProductController@index');
Route::get('/create-products', 'Web\ProductController@create');
Route::get('/edit-products/{id}', 'Web\ProductController@edit');
Route::get('/delete-products/{id}/{id_brand}', 'Web\ProductController@delete');

Route::post('/store-products', 'Web\ProductController@store');
Route::post('/update-products/{id}', 'Web\ProductController@update');


//=================== END =======================

// ===================== ORDERS =====================

Route::get('list-orders', 'Web\OrdersController@index');
Route::get('update-orders/{id}', 'Web\OrdersController@update');
Route::get('delete-orders/{id}', 'Web\OrdersController@delete');


// ======================= END ORDERS ===============


// ===================== DETAIL ORDERS ===============
Route::get('list-detail/{id}', 'Web\DetailController@index');
Route::get('delete-detail/{id}/{id_orders}', 'Web\DetailController@delete');


// ============= END ======================

//================ USERS ===============

Route::get('list-users', 'Web\UserController@index');
Route::get('delete-users/{id}', 'Web\UserController@delete');
Route::get('form-login', 'Web\UserController@formLogin');
Route::get('form-register', 'Web\UserController@formRegister');

Route::post('login', 'Web\UserController@login');
Route::post('register', 'Web\UserController@register');


// ================== NOTIFICATON =====================
Route::get('list-notification', 'Web\NotificationController@index');
Route::get('edit-notification', 'Web\NotificationController@edit');
Route::get('create-notification', 'Web\NotificationController@create');

Route::post('update-notification', 'Web\NotificationController@update');
Route::post('delete-notification', 'Web\NotificationController@delete');
Route::post('store-notification', 'Web\NotificationController@store');
