<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/{id}/show', [ShopController::class, 'show'])->name('shop.show');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::resource('shoppingCarts', ShoppingCartController::class)->only('index', 'store');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::put('shoppingCarts', [ShoppingCartController::class, 'update'])->name('shoppingCarts.update');
    Route::get('shoppingCarts/{id}', [ShoppingCartController::class, 'destroy'])->name('shoppingCarts.destroy');
    Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('admin/dashboard', 'layouts.admin.master');
    Route::resource('sellers', SellerController::class);
    Route::resource('buyers', BuyerController::class);
});

Route::middleware(['auth', 'role:penjual'])->group(function () {
    Route::view('penjual/dashboard', 'layouts.admin.master');
});

Route::middleware(['auth', 'role:admin,penjual'])->group(function () {
    Route::resource('goods', GoodsController::class);
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}/show', [TransactionController::class, 'show'])->name('transactions.show');
});

Route::middleware(['auth', 'role:pembeli'])->group(function () {
    Route::view('pembeli/dashboard', 'layouts.admin.master');
});
