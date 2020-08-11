<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


    Route::get('/getBrand', "Api\BrandController@getBrand");

    // products

    Route::get('/mobileProduct', 'Api\ProductController@mobileProduct')->name('mobileProduct');
    Route::post('/getProBrand', 'Api\ProductController@getProBrand');

    Route::get('/getProduct', 'Api\ProductController@getProduct');
    Route::post('/updateProduct', 'Api\ProductController@updateProduct');

    Route::get('/computerProduct', 'Api\ProductController@computerProduct');
    Route::post('getProCate', 'Api\ProductController@getProCate');

    Route::post('search', 'Api\ProductController@search');
    Route::post('them-san-pham-da-xem', 'Api\ProductController@daXem'); // s?n ph?m d� xem
    Route::post('getSanPhamDaXem', 'Api\ProductController@getSanPhamDaXem');



    // user
    Route::post('/register', "Api\UserController@register");
    Route::post('/login', "Api\UserController@login");

    //orders
    Route::post('/insert', 'Api\OrdersController@insert');
    Route::post('/insert-detailOrders', 'Api\OrdersController@insertDetailOrders');
    Route::post('/getOrder', 'Api\OrdersController@getOrder');
    Route::post('/getOrderSuccess', 'Api\OrdersController@getOrderSuccess');
    Route::post('/deleteOrders', 'Api\OrdersController@delete');

   Route::post('/getOrderDetail', 'Api\OrdersController@getOrderDetail');

   // comment
   Route::post('/insertComment', 'Api\CommentController@insertComment');
   Route::post('/getComment', 'Api\CommentController@getComment');
   Route::post('/yourComment', 'Api\CommentController@yourComment');



   Route::post('/countComment', 'Api\ProductController@countComment');
   Route::post('/countStar', 'Api\ProductController@countStar');

   // notification
   Route::post('getNotification', 'Api\NotificationController@index');





