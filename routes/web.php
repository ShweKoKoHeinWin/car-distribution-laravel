<?php

// use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\frontend\PageController;


use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\VehicleController;
use App\Http\Controllers\backend\UserController;

use App\Http\Controllers\Auth\RegisterController;

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

// FrontEnd Page
Route::get('/', [PageController::class, 'show']);

//Vehicle
Route::get('/vehicles', [PageController::class, 'vehicles']);
Route::get('backend/vehicles/{id}/show', [VehicleController::class, 'show']);

//Services
Route::get('/services', [PageController::class, 'services']);


// Users
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


// auth
Route::group(['middleware' => 'auth'], function () {
    //Notifications
    Route::get('/noti', [PageController::class, 'showNotifications']);
    Route::get('/noti/clear', [PageController::class, 'clearNotifications']);

    //log out
    Route::get('/logout', [LoginController::class, 'logout']);
});

//dashboard
Route::get('/backend', [AdminController::class, 'index'])->middleware('admin.dashboard');

Route::group(['middleware' => 'content.writer'], function () {

    // Content Writer Page
    Route::get('/frontend/interface', [PageController::class, 'index']);
    Route::get('/frontend/interface/create', [PageController::class, 'create']);
    Route::post('/frontend/interface/create', [PageController::class, 'store']);
    Route::get('/frontend/interface/edit/{id}', [PageController::class, 'edit']);
    Route::post('/frontend/interface/edit/{id}', [PageController::class, 'update']);
    Route::get('/frontend/interface/delete/{id}', [PageController::class, 'destroy']);
});

Route::group(['middleware' => 'vehicle.specialist'], function () {

    // Brands
    Route::get('/backend/brands', [BrandController::class, 'index']);

    Route::get('/backend/brands/create', [BrandController::class, 'create']);
    Route::post('/backend/brands/create', [BrandController::class, 'store']);

    Route::get('/backend/brands/delete/{brand}', [BrandController::class, 'destroy']);

    // Categories
    Route::get('/backend/categories', [CategoryController::class, 'index']);

    Route::get('/backend/categories/create', [CategoryController::class, 'create']);
    Route::post('/backend/categories/create', [CategoryController::class, 'store']);

    Route::get('/backend/categories/delete/{category}', [CategoryController::class, 'destroy']);

    //Services
    Route::get('/backend/services', [ServiceController::class, 'index']);
    Route::get('/backend/services/create', [ServiceController::class, 'create']);
    Route::post('/backend/services/create', [ServiceController::class, 'store']);
    Route::get('/backend/services/{type}/{id}/edit', [ServiceController::class, 'edit']);
    Route::post('/backend/services/{type}/{id}/edit', [ServiceController::class, 'update']);
    Route::get('/backend/services/{type}/{id}/delete', [ServiceController::class, 'destroy']);

    //Vehicle
    Route::get('backend/vehicles', [VehicleController::class, 'index']);
    Route::get('backend/vehicles/create', [VehicleController::class, 'create']);
    Route::post('backend/vehicles/create', [VehicleController::class, 'store']);
    Route::get('backend/vehicles/{id}/edit', [VehicleController::class, 'edit']);
    Route::post('backend/vehicles/{id}/edit', [VehicleController::class, 'update']);
    Route::get('backend/vehicles/{id}/delete', [VehicleController::class, 'destroy']);
});



Route::group(['middleware' => 'ceo'], function () {
    // Roles
    Route::get('/backend/roles', [RoleController::class, 'index']);

    Route::post('/backend/roles/create', [RoleController::class, 'store']);

    Route::get('/backend/roles/delete/{role}', [RoleController::class, 'destroy']);
});

Route::group(['middleware' => 'user.control'], function () {
    //Users
    Route::get('backend/users', [UserController::class, 'index']);
    Route::get('backend/users/{id}/edit', [UserController::class, 'edit']);
    Route::post('backend/users/{id}/edit', [UserController::class, 'update']);
    Route::get('backend/users/{id}/delete', [UserController::class, 'destroy']);
});
