<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;

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

//frontend user home page
Route::get('/', [HomeController::class, 'index']);

//admin user routes
Route::get('admin', function(){ return redirect()->route('admin.login'); });
Route::group(['prefix'=>'admin'], function(){
    Route::group(['middleware'=>'admin.guest'], function(){
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('loginSubmit', [AdminLoginController::class, 'loginSubmit'])->name('admin.loginSubmit');
    });
    Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');    
    });
});


//Route::group(['middleware'=>'guest'], function(){
    Route::get('login', [UserAuthController::class, 'login'])->name('login');
    Route::post('loginSubmit', [UserAuthController::class, 'loginSubmit'])->name('loginSubmit');
//});
//Route::group(['middleware'=>'auth'], function(){
    Route::get('dashboard', [UserAuthController::class, 'index'])->name('dashboard');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('home', [HomeController::class, 'index'])->name('home');
//});
