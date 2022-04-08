<?php

use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SslCommerzPaymentController;
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
    return view('home.home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
// --------------------------------------------------------------------
                    // For Admin Site
// -----------------------------------------------------------------------
Route::prefix('/')->middleware(['auth', 'is_admin', 'is_block'])->group(function () {
    Route::resource('dashboard', DashboardContoller::class);
    Route::resource('users', UserController::class);
    Route::get('user/{user}',[ UserController::class, 'isBlock'])->name('is_block');
    Route::post('change-role/{user}', [UserController::class, 'changeRole'])->name('user.change_role');
    Route::resource('main_categories', MainCategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
    Route::resource('products', ProductController::class);
});
// --------------------------------------------------------------------
                    // For Admin Site
// --------------------------------------------------------------------
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
