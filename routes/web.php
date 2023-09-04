<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransactionUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;

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

Route::get('/default', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard-default', function () {
        return view('dashboard');
    })->name('dashboardDefault');
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{slug}', [CategoryController::class, 'detail'])->name('categoryDetail');

Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::get('/checkout/{slug}/transaction', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/{slug}/transaction', [CheckoutController::class, 'prosess'])->name('checkoutProsess');
Route::get('/success', [CheckoutController::class, 'success'])->name('success-checkout');




Route::prefix('Admin')
    ->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('gallery', ProductGalleryController::class);
    Route::get('/setting/{name}', [SettingController::class, 'index'])->name('setting');
    Route::post('/update-setting', [SettingController::class, 'updateOrcreate'])->name('updateOrcreate');
    Route::resource('transaction', TransactionController::class);
    Route::resource('transactionUser', TransactionUserController::class);
});