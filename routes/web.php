<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\motorcycleController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMotorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

// Home Page
Route::get('/', [homeController::class, 'index'])->name('home');

// Products Page
Route::get('/product', [productController::class, 'index'])->name('product');

// Motorcycles Page
Route::get('/product/{id}', [MotorController::class, 'index'])->name('motorcycle');

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register Page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Payment page
Route::get('/payment/{id}', [PaymentController::class, 'index'])->name('payment');

// Add to Cart
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

// Remove from Cart
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCart'])->name("cart.remove");

// Checkout Item
Route::post('/checkout/{id}', [PaymentController::class, 'payment'])->name("checkout");

// Order
Route::post('/orders/{order}/finish', [OrderController::class, 'finish'])->name('orders.finish');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Appointment
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::get('/appointment/available-slots/{date}', [AppointmentController::class, 'getAvailableSlots'])->name('appointment.slots');
Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
Route::delete('appointments/delete/{id}', [AppointmentController::class, 'delete'])->name('appointment.delete');


Route::group(['middleware' => ['auth.custom', 'jwt.auth']], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
});

// Route::group(['middleware' => ['auth.custom', 'jwt.auth', 'admin']], function () {
Route::group(['middleware' => ['auth.custom', 'jwt.auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Account Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Motor Management
    Route::get('/admin/motorcycles', [AdminMotorController::class, 'index'])->name('admin.motorcycles.index');
    Route::get('/admin/motorcycles/create', [AdminMotorController::class, 'create'])->name('admin.motorcycles.create');
    Route::post('/admin/motorcycles', [AdminMotorController::class, 'store'])->name('admin.motorcycles.store');
    Route::get('/admin/motorcycles/{motorcycle}/edit', [AdminMotorController::class, 'edit'])->name('admin.motorcycles.edit');
    Route::put('/admin/motorcycles/{motorcycle}', [AdminMotorController::class, 'update'])->name('admin.motorcycles.update');
    Route::delete('/admin/motorcycles/{motorcycle}', [AdminMotorController::class, 'destroy'])->name('admin.motorcycles.destroy');

    // Order Management
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::post('/admin/orders/{order}/ship', [AdminOrderController::class, 'ship'])->name('admin.orders.ship');

    // Brand Management
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands');
    Route::post('/admin/brands', [BrandController::class, 'store'])->name('admin.brands.create');
    Route::delete('/admin/brands/{brand}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    // Product Management
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Appointment Management
    Route::get('/admin/appointments', [AppointmentController::class, 'adminIndex'])->name('admin.appointments.index');
    Route::put('appointments/{id}/accept', [AppointmentController::class, 'accept'])->name('appointment.accept');
    Route::put('appointments/{id}/reject', [AppointmentController::class, 'reject'])->name('appointment.reject');
    Route::delete('appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
});

// Authentication Handle
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('me', [AuthController::class, 'me'])->name('me');
});
