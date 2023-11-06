<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsController;

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');
Route::get('/login/customer', [LoginController::class, 'showCustomerLoginForm'])->name('login.customer');
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm'])->name('register.admin');
Route::get('/register/customer', [RegisterController::class, 'showCustomerRegisterForm'])->name('register.customer');

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/customer', [LoginController::class, 'showCustomerRegisterForm']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin'])->name('register.admin');
Route::post('/register/customer', [RegisterController::class, 'createcustomer'])->name('register.customer');
Route::post('/import', [NewsController::class, 'import'])->name('news.import');
Route::view('/home', 'home')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:customer'], function () {
    Route::view('/customer', 'customer');
});