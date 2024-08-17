<?php

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

Route::get('/', 'User\PageController@home');
Route::get('/about', 'User\PageController@about');
Route::get('/contact', 'User\PageController@contact');
Route::get('/tours', 'User\PageController@tours');
Route::get('/destination', 'User\PageController@destination');
Route::post('/packages/increment-view/{id}', 'User\PackageController@packageDetail')->name('packages.incrementView');
Route::get('/search', 'User\PackageController@search')->name('tours.search');



//user route
Route::get('/login', 'User\AuthController@showLogin');
Route::post('/login', 'User\AuthController@Login');
Route::get('/register', 'User\AuthController@showRegister');
Route::post('/register', 'User\AuthController@Register');
Route::group(['middleware' => 'RedirectIfNotAuth'], function () {
    Route::get('/logout', 'User\AuthController@Logout');
    Route::get('/userProfile', 'User\AuthController@userProfile')->name('userProfile');
    Route::post('/updateProfile/{id}', 'User\AuthController@updateProfile')->name('updateProfile');
    Route::post('/changePwd/{id}', 'User\AuthController@changePwd')->name('changePwd');
    Route::get('/cart', 'User\PackageController@cart')->name('cart');
    Route::post('/bookTrip/{id}', 'User\PackageController@bookTrip')->name('bookTrip');
    Route::post('/update-quantity/{id}/increase', 'User\PackageController@increaseQuantity');
    Route::post('/update-quantity/{id}/decrease', 'User\PackageController@decreaseQuantity');
    Route::post('/update-quantity/{id}/remove', 'User\PackageController@removeItem');
    Route::get('/checkout', 'User\PackageController@checkout');
    Route::post('/order', 'User\PackageController@addOrder');
    Route::get('/thanks', 'User\PackageController@thanks')->name('thanks');
});


//Admin Route
Route::get('/admin/login', 'Admin\AuthController@showLogin');
Route::post('/admin/login', 'Admin\AuthController@Login');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'RedirectIfNotAdmin'], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/dashboard', 'PageController@dashboard');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/packages', 'ProductController');
    Route::resource('/payments', 'PaymentController');
    Route::resource('/users', 'UserController');
    Route::resource('/guides', 'TourController');
    Route::resource('/admins', 'AdminController');
    Route::resource('/orders', 'OrderController');
    Route::get('/profile/{admin}', 'AdminController@showProfile');
    Route::post('/orders/update-status', 'OrderController@updateStatus')->name('orders.updateStatus');
});
