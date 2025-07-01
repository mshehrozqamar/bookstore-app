<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('modal', 'modal');

Route::view('login', 'login')->name('login');
Route::view('register', 'register');
Route::view('admin', 'admin-login');

Route::get('verify-otp', [CustomerController::class, 'storeOtp'])->name('store.otp');
Route::post('confirm-otp', [CustomerController::class, 'verifyOtp'])->name('verify.otp');
Route::get('resend-otp', [CustomerController::class, 'verifyOtp'])->name('verify.otp');
Route::post('customer-register', [CustomerController::class, 'addCustomer']);
Route::get('customer-login', [CustomerController::class, 'login']);
Route::get('admin-login', [AdminController::class, 'login']);
Route::get('admin-portal', [BookController::class, 'listAdminBooks']);
Route::post('add-new-book', [BookController::class, 'addBook']);
Route::get('delete-book/{id}', [BookController::class, 'deleteBook']);
Route::get('populate/{id}', [BookController::class, 'populateForm']);
Route::put('/update-book/{id}', [BookController::class, 'updateBook']);
Route::get('/orders', [OrderController::class, 'listOrder']);
Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder']);
Route::get('view-order/{id}', [OrderController::class, 'orderDetails']);
Route::get('confirm-order/{id}', [OrderController::class, 'orderConfirm']);



Route::middleware('auth')->group(function(){
    Route::view('add-books', 'add-books');
    Route::get('home', [BookController::class, 'listBooks']);
    Route::get('/sign-out', [CustomerController::class, 'signOut']);
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'listCart']);
    Route::get('/increment/{id}', [CartController::class, 'increment']);
    Route::get('/decrement/{id}', [CartController::class, 'decrement']);
    Route::get('/remove-cart/{id}', [CartController::class, 'removeFromCart']);
    Route::get('/checkout', [CartController::class, 'cartCheckout']);
});