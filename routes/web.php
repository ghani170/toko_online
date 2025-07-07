<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('toko');
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/toko', [AuthController::class, 'toko'])->name('toko');

Route::middleware(['auth'])->group(function (){
   
    Route::get('/user/{user}/edit', [AuthController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [AuthController::class, 'update'])->name('user.update');
    Route::get('/produk/{id}', [ProductController::class, 'lihat'])->name('produk.lihat');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/process', [KeranjangController::class, 'processCheckout'])->name('checkout.process');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/{order}/detail', [OrderController::class, 'orderDetail'])->name('orders.detail');
     // Route untuk CRUD produk
    Route::get('/admin/produk/create', [ProductController::class, 'create'])->name('produk.create');
    Route::post('/admin/produk', [ProductController::class, 'store'])->name('produk.store');
    Route::get('/admin/produk/{product}/edit', [ProductController::class, 'edit'])->name('produk.edit');
    Route::put('/admin/produk/{product}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/admin/produk/{product}', [ProductController::class, 'destroy'])->name('produk.destroy');
});

