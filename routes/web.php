<?php

use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Order\OrdersController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'role:client'])->group(function () {

    Route::get('/register-client',[ClientController::class,'register'])->name('register-client');
    Route::get('/client-dashboard',[ClientController::class,'index'])->name('client-dashboard');
    Route::get('/client-product-list',[ClientController::class,'product'])->name('product-list-client');

    Route::get('/client-order-list',[ClientController::class,'order'])->name('orders-list-client');
    Route::get('/orders-list-api-client',[ClientController::class,'ilist'])->name('orders-list-api-client');
    Route::get('/client-order-summary',[ClientController::class,'orderSummary'])->name('order-summary-client');

    Route::get('/client-business-list',[ClientController::class,'business'])->name('business-list-client');
    Route::get('/client-business-list-api',[ClientController::class,'iListBusiness'])->name('business-list-client-api');
    Route::get('/client-product-list-api',[ClientController::class,'iListProduct'])->name('product-list-client-api');
    Route::get('/client-product-add',[ClientController::class,'addProduct'])->name('addProduct-client');
    Route::post('/client-product-add',[ClientController::class,'addProductPost'])->name('addProduct-post');
    Route::get('/client-product-status',[ClientController::class,'productClientStatus'])->name('client-product-status');
    Route::get('/client-product-summary',[ClientController::class,'productSummary'])->name('client-product-summary');


    Route::get('/business-registration',[BusinessController::class,'businessRegistration'])->name('business-registration');
    Route::post('/business-registration',[BusinessController::class,'businessRegistrationPost'])->name('business-registration-post');

    Route::get('/client-payment-list',[ClientController::class,'paymentList'])->name('payment-list-client');
    Route::get('/payment-list-client-api',[PaymentController::class,'ilist'])->name('payment-list-client-api');

    Route::get('/client-profile',[StaffController::class,'index'])->name('profile-client');




});


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/product-list',[ProductController::class,'index'])->name('product-list');
    Route::get('/product-add',[ProductController::class,'add'])->name('product-add');
    Route::post('/product-add',[ProductController::class,'create'])->name('add-product');
    Route::get('/product-all',[ProductController::class,'ilist'])->name('product-all');
    Route::get('/product-status',[ProductController::class,'productStatus'])->name('product-status');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit-product');



    Route::get('/business-list',[BusinessController::class,'index'])->name('business-list');
    Route::get('/business-add',[BusinessController::class,'add'])->name('business-add-registration');
    Route::post('/business-add',[BusinessController::class,'businessRegistrationPost'])->name('business-add');
    Route::get('/business-all',[BusinessController::class,'ilist'])->name('business-all');
    Route::get('/business-details/{id}',[BusinessController::class,'details'])->name('business-details');


    Route::get('/orders-list',[OrdersController::class,'index'])->name('orders-list');
    Route::get('/orders-list-api',[OrdersController::class,'ilist'])->name('orders-list-api');
    Route::get('/order-summary',[OrdersController::class,'orderSummary'])->name('order-summary');


    Route::get('/payment-list',[PaymentController::class,'index'])->name('payment-list');
    Route::get('/payment-list-api',[PaymentController::class,'ilist'])->name('payment-list-api');
//    Route::get('/client-dashboard',[ClientController::class,'index'])->name('client-dashboard');

    Route::get('/product-summary',[ProductController::class,'productSummary'])->name('product-summary');

    Route::get('/business-owner',[BusinessController::class,'businessOwner'])->name('business-owner');

    Route::get('/profile',[StaffController::class,'index'])->name('profile');
});


//Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::group(['middleware' => 'auth'], function () {
//
//    Route::get('/product-list',[ProductController::class,'index'])->name('product-list');
//    Route::get('/product-add',[ProductController::class,'add'])->name('product-add');
//    Route::post('/product-add',[ProductController::class,'create'])->name('add-product');
//    Route::get('/product-all',[ProductController::class,'ilist'])->name('product-all');
//    Route::get('/product-status',[ProductController::class,'productStatus'])->name('product-status');
//    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit-product');
//
//
//
//    Route::get('/business-list',[BusinessController::class,'index'])->name('business-list');
//    Route::get('/business-add',[BusinessController::class,'add'])->name('business-add-registration');
//    Route::post('/business-add',[BusinessController::class,'businessRegistrationPost'])->name('business-add');
//    Route::get('/business-all',[BusinessController::class,'ilist'])->name('business-all');
//    Route::get('/business-details/{id}',[BusinessController::class,'details'])->name('business-details');
//
//
//    Route::get('/orders-list',[OrdersController::class,'index'])->name('orders-list');
//    Route::get('/orders-list-api',[OrdersController::class,'ilist'])->name('orders-list-api');
//    Route::get('/order-summary',[OrdersController::class,'orderSummary'])->name('order-summary');
//
//
//   Route::get('/payment-list',[PaymentController::class,'index'])->name('payment-list');
//   Route::get('/payment-list-api',[PaymentController::class,'ilist'])->name('payment-list-api');
//   Route::get('/client-dashboard',[ClientController::class,'index'])->name('client-dashboard');
//
//    Route::get('/product-summary',[ProductController::class,'productSummary'])->name('product-summary');
//
//});

