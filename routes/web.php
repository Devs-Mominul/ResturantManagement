<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/redirects',[HomeController::class,'redirects']);
Route::get('/users',[AdminController::class,'user'])->name('users');
Route::get('/users/remove/{id}',[AdminController::class,'user_remove'])->name('user.remove');
Route::get('/food',[AdminController::class,'food'])->name('food');
Route::post('/food/store',[AdminController::class,'food_store'])->name('food.store');
Route::post('/reservation/store',[AdminController::class,'reservation_store'])->name('reservation.store');
Route::post('/addtocarts/{id}',[HomeController::class,'artocart_store'])->name('arttocart.store');
Route::get('/cart/list/{id}',[HomeController::class,'cart_list'])->name('cart.list');
Route::post('/order',[HomeController::class,'order'])->name('order');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
