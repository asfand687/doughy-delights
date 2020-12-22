<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/menu', [ProductController::class, 'index']);
Route::get('search', [ProductController::class, 'search']);
Route::get('/specials', [ProductController::class, 'specials']);
Route::get('/gift_baskets', [ProductController::class, 'giftBaskets']);
Route::get('/product/{id}', [ProductController::class, 'detail']);
Route::post('/add_to_cart', [ProductController::class, 'addToCart']);
Route::get('/cart_list', [ProductController::class, 'cartList']);
Route::get('/removecart/{id}', [ProductController::class, 'removeCart']);
Route::get('/checkout', [ProductController::class, 'cartCheckout']);
Route::post('/order_place', [ProductController::class, 'orderPlace']);

