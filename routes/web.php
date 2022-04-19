<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WishListController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripeController;
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
    return view('front.home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
// --------------------------------------------------------------------
                    // Start For Admin Site
// -----------------------------------------------------------------------
Route::prefix('/')->middleware(['auth', 'is_admin', 'is_block'])->group(function () {
    Route::resource('dashboard', DashboardContoller::class);
    Route::resource('users', UserController::class);
    Route::get('user/{user}',[ UserController::class, 'isBlock'])->name('is_block');
    Route::post('change-role/{user}', [UserController::class, 'changeRole'])->name('user.change_role');
    Route::resource('main_categories', MainCategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('wish_list', WishListController::class);
    Route::post('wish_list/{product}',[ WishListController::class, 'addToWishList'])->name('admin.addWishList');
    Route::resource('cart', CartController::class);
    Route::post('cart/{product}', [CartController::class, 'addCart'])->name('admin.addCart');
    Route::resource('orders', OrderController::class);
});
// --------------------------------------------------------------------
                    //End For Admin Site
// --------------------------------------------------------------------
// --------------------------------------------------------------------
                    // SSLCOMMERZ Start
// --------------------------------------------------------------------
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/payment/sslCommerce', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('home.payment');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// -----------------------------------------------------------------------
                        //SSLCOMMERZ END
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------
                       // Start Front Controller
// ------------------------------------------------------------------------
Route::resource('home', HomeController::class);
Route::get('categorys', [HomeController::class, 'category'])->name('home.category');
Route::get('home_products', [HomeController::class, 'product'])->name('home.product');
Route::get('product-view/{product}', [HomeController::class, 'productView'])->name('home.product_view');
Route::prefix('/')->middleware(['auth','is_block'])->group(function () {
    Route::post('wish_list_home/{product}', [HomeController::class, 'wishListStore'])->name('home.wish_list');
    Route::get('home_wish_list', [HomeController::class, 'wishList'])->name('home.wish_list');
    Route::delete('home_wish_list/{wishlist}', [HomeController::class, 'wishListDestroy'])->name('home.wish_list_destroy');
    Route::get('homeCart', [HomeController::class, 'homeAddCart'])->name('home.addCart');
    Route::post('homeCart/{product}', [HomeController::class, 'addCartStore'])->name('home.homeCartStore');
    Route::post('choseOrder', [HomeController::class, 'choseOrder'])->name('home.choseOrder');
    Route::get('myDeal', [HomeController::class, 'myDeal'])->name('home.myDeal');
    Route::get('order_details/{order}', [HomeController::class, 'myDealView'])->name('home.myDealView');
    Route::resource('payment/stripe', StripeController::class);
    // -------------------------------------------------------------------
                                // Stripe
    Route::post('payment/stripe', [StripeController::class, 'stripeStore'])->name('stripe.post');
    // ----------------------------------------------------------------------
                            // Cash on Delivery
    Route::get('cash_on_delivery', [HomeController::class, 'cashOnDelivery'])->name('home.cash_on_delivery');
    Route::post('cash_on_delivery', [HomeController::class, 'cashOnDeliveryStore'])->name('home.cash_on_delivery_store');
    Route::get('profile', [HomeController::class, 'profile'])->name('home.profile');
    Route::post('changePassword', [HomeController::class, 'changePassword'])->name('user.changePassword');
    Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::post('contact', [HomeController::class, 'contactStore'])->name('home.contact_store');
});
// ------------------------------------------------------------------------
                       // End Front Controller
// ------------------------------------------------------------------------