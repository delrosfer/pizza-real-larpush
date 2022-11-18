<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserOrderController;
use App\Events\OrderStatusChangedEvent;

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

Route::get('/fire', function () {
    event(new OrderStatusChangedEvent);
    return 'Aprobado';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/order', [UserOrderController::class, 'index'])->name('user.order');
    Route::get('/order/create', [UserOrderController::class, 'create'])->name('user.order.create');
    Route::post('/order', [UserOrderController::class, 'store'])->name('user.order.store');
    Route::get('/order/{order}', [UserOrderController::class, 'show'])->name('user.order.show');
});

// Admin Routes - make sure you implement an auth layer here
Route::prefix('admin')->group(function () {
    Route::get('/order', [AdminOrderController::class, 'index'])->name('admin.order');
    Route::get('/order/edit/{order}', [AdminOrderController::class, 'edit'])->name('admin.order.edit');
    Route::patch('/order/{order}', [AdminOrderController::class, 'update'])->name('admin.order.update');
});
