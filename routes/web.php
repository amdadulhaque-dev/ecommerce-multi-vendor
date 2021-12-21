<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CartController,
    CategoryController,
    CouponController,
    FrontendController,
    HomeController,
    ProductController,
    VendorController,
    WishListController,
    CheckoutController,
    ServicesAreaController,
};

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

// FrontendController
Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('product/details/{slug}', [FrontendController::class, 'ProductDetails'])->name('productdetails');
Route::get('product/list/{category_id}', [FrontendController::class, 'CategoryWiseProduct'])->name('categorywiseproducts');
Route::get('shop/', [FrontendController::class, 'shop'])->name('shop');


// Frontend Resource Controller
// Wishlist
Route::get('wishlist/add/{product_id}', [WishListController::class, 'add'])->name('wishlist.add');
Route::get('wishlist/remove/{product_id}', [WishListController::class, 'remove'])->name('wishlist.remove');
Route::resource('wishlist', WishListController::class);

// Cart
// Route::resource('cart', CartController::class);
Route::post('cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/remove/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('clear/shopping/', [CartController::class, 'clearshoppingcart'])->name('clearshopping.cart');
Route::post('/cart/update', [CartController::class, 'cartupdate'])->name('cart.update');
Route::get('cart/', [CartController::class, 'cart'])->name('cart');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('place/checkout', [CheckoutController::class, 'place_checkout'])->name('place.checkout');
Route::post('/get/city/list', [CheckoutController::class, 'getcitylist'])->name('getcitylist');



Route::get('login', function () {
    return view('auth.login');
});

Auth::routes();


// HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/emailoffer', [HomeController::class, 'EmailOfferView'])->name('emailoffer');

Route::get('/emailoffer/send/{id}', [HomeController::class, 'EmailOfferSend'])->name('emailoffersend');
Route::post('/multipul/emailoffer/send', [HomeController::class, 'MultipulMailSend'])->name('multipulmailsend');



// Resource Controller
Route::resource('category', CategoryController::class);
Route::resource('vendor', VendorController::class);
Route::resource('product', ProductController::class);
Route::resource('coupon', CouponController::class);

// ServicesArea
Route::get('/services/area', [ServicesAreaController::class, 'index'])->name('servicesarea.index');
Route::get('/services/area/create', [ServicesAreaController::class, 'create'])->name('servicesarea.create');
Route::post('/services/area/update', [ServicesAreaController::class, 'updatearea'])->name('servicesarea.update');
