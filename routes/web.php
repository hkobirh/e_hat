<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CustomerControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductReviewController;



Route::get('clear',function (){
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');

    return redirect()->route('index');
});



Route::get('/', [SiteController::class, 'index'])->name('index');
Route::post('/', [SiteController::class, 'load_more'])->name('load.more');
Route::get('/product-quick-view/{slug}', [SiteController::class, 'product_quick_view'])->name('product.quick.view');
Route::get('/product/{slug}', [SiteController::class, 'single_product'])->name('single.product');
Route::get('/category/{slug1}/{slug2?}/{slug3?}', [SiteController::class, 'category_products'])->name('category.products');
Route::post('/category/{slug1}/{slug2?}/{slug3?}', [SiteController::class, 'load_more_cat_product'])->name('load.more.cat.product');
Route::get('/change/lang', [SiteController::class, 'change_lang'])->name('change.lang');
Route::post('/home-search', [SiteController::class, 'home_search'])->name('home.search');
Route::get('/track-order', [SiteController::class, 'track_order'])->name('track.order');
Route::post('/track-order', [SiteController::class, 'track_order']);
Route::post('/product/review', [ProductReviewController::class, 'store'])->name('product.review');

// Card routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart-info', [CartController::class, 'get_cart'])->name('cart.info');
Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart-remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::get('/cart-clear', [CartController::class, 'cart_clear'])->name('cart.clear');
Route::middleware('customer.middleware')->group(function () {
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'new_order']);
});

// Backend routes
Route::prefix('staff')->middleware(['auth', 'test'])->name('staff.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resources([
        'users'      => UserController::class,
        'brands'     => BrandsController::class,
        'categories' => CategoryController::class,
        'products'   => ProductController::class,
        'sliders'    => SliderController::class,
    ]);
    Route::get('/product/reviews', [ProductReviewController::class, 'view'])->name('product.reviews');
    Route::get('/no-access', function () {
        return view('backend.no-access');
    })->name('no.access');

    Route::post('/brands/bulk-action', [BrandsController::class, 'bulk_action'])->name('brand.bluck.action');
    Route::post('/brands/status-toggle', [BrandsController::class, 'status_toggle'])->name('brand.status.toggle');

    Route::post('/users/bulk-action', [UserController::class, 'bulk_action'])->name('user.bluck.action');
    Route::post('/users/status-toggle', [UserController::class, 'status_toggle'])->name('user.status.toggle');

    Route::post('/categories/bulk-action', [CategoryController::class, 'bulk_action'])->name('categories.bluck.action');
    Route::post('/categories/status-toggle', [CategoryController::class, 'status_toggle'])->name('categories.status.toggle');
});


// Customer routes
Route::prefix('auth')->group(function () {
    Route::get('/register', [CustomerControler::class, 'register_form'])->name('register');
    Route::get('/verify/{token}', [CustomerControler::class, 'verify'])->name('verify');
    Route::post('/register', [CustomerControler::class, 'register']);
    Route::post('/login', [CustomerControler::class, 'login'])->name('login');
    Route::get('/logout', [CustomerControler::class, 'logout'])->name('logout');
    Route::get('/dashboard', [CustomerControler::class, 'index'])->middleware('customer.middleware')->name('customer.dashboard');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/view/{id}', [OrderController::class, 'view'])->name('orders.view');
    Route::get('/orders/invoice/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');
});


require __DIR__ . '/auth.php';
