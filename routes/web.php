<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('product/{slug}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('product');
Route::get('faq', [\App\Http\Controllers\PagesController::class, 'faq'])->name('faq');
Route::get('gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('page/{slug}', [\App\Http\Controllers\PagesController::class, 'index'])->name('page');
Route::get('category/{slug}', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('blog/{slug}', [\App\Http\Controllers\BlogController::class, 'details'])->name('blog-detail');
Route::get('blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('blog/category/{slug}', [\App\Http\Controllers\BlogController::class, 'indexBlogCat'])->name('blog.category');
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showSiteLoginForm'])->name('login');
Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showSiteRegisterForm'])->name('register');

Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'loginSite'])->name('login');
Route::any('add-to-cart', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart/json', [\App\Http\Controllers\CartController::class, 'jsonCart'])->name('cart.jsonCart');
Route::post('cart/store', [\App\Http\Controllers\CartController::class, 'storeCart'])->name('cart.store');

Route::post('cart/changeQuantity', [\App\Http\Controllers\CartController::class, 'changeQuantity'])->name('cart.changeQuantity');

Route::group(['middleware' => 'auth:customer'], function() {
    Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');

    Route::get('checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout', [\App\Http\Controllers\CheckoutController::class, 'postCheckout'])->name('cart.postCheckout');
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::post('profile-update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile-update');
    Route::post('password-update', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('password-update');
});

Route::group(['as' => 'admin.','prefix' => 'admin'],function (){

    Auth::routes();

    Route::group(['middleware' => 'auth','namespace' => 'Admin'], function() {

        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('user', 'UserController');
        Route::resource('customer', 'CustomerController');
        Route::resource('order', 'OrderController');
        Route::resource('product', 'ProductController');
        Route::resource('product_category', 'ProductCategoryController');
        Route::resource('product_attribute', 'ProductAttributeController');
        Route::resource('language', 'LanguageController');
        Route::resource('role','RoleController');
        Route::resource('page', 'PageController');
        Route::resource('category', 'CategoryController');
        Route::resource('post', 'PostController');
        Route::resource('faq', 'FaqController');
        Route::resource('service', 'ServiceController');
        Route::resource('portfolio', 'PortfolioController');
        Route::resource('testimonial', 'TestimonialController');
        Route::resource('contact', 'ContactController');
        Route::resource('team', 'TeamController');
        Route::resource('subscriber', 'SubscriberController');
        Route::resource('menu', 'MenuController');

        Route::get('setting', 'SettingController@index')->name('setting');
        Route::post('setting', 'SettingController@store')->name('setting');
        Route::get('filemanager','FileManager@index')->name('filemanager');
        Route::post('menu/{menu}/create/{type}','MenuController@createContent')->name('menu.create.content');
        Route::post('menu/{menu}/update','MenuController@updateContent')->name('menu.update.content');
        Route::delete('menu/content/{menucontent}','MenuController@deleteContent')->name('menu.delete.content');

        Route::post('product/{product}/dropzone', 'ProductController@dropzone')->name('product.dropzone');
        Route::delete('product/{product}/dropzone/delete', 'ProductController@dropzoneDelete')->name('product.dropzone.delete');

        Route::group(['prefix' => 'single_product', 'as' => 'single_product.'], function (){

            Route::get('{product}','SingleProductAttributeController@index')->name('index');
            Route::post('{product}','SingleProductAttributeController@store')->name('store');
            Route::delete('{single_product_attribute}','SingleProductAttributeController@destroy')->name('destroy');


        });
    });
});
