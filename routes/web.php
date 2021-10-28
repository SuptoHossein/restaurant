<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


// auth route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// project routes
Route::get('/', [HomeController::class, 'index']);

// Group Routes
Route::middleware(['auth'])->group(function () {

    // User Condition Routes
    Route::get('/redirects', [HomeController::class, 'redirects']);

    // User Routes
    Route::get('/users', [AdminController::class, 'user']);
    Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

    // Food Menu Routes
    Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
    Route::post('/uploadfood', [AdminController::class, 'upload']);
    Route::get('/updateview/{id}', [AdminController::class, 'updateview']);
    Route::post('/update/{id}', [AdminController::class, 'update']);
    Route::get('/deletemenu/{id}', [AdminController::class, 'deletemenu']);

    // Reservation Routes
    Route::post('/reservation', [AdminController::class, 'reservation']);
    Route::get('/reservations', [AdminController::class, 'viewreservation']);

    // Chefs Routes
    Route::get('/chefs', [AdminController::class, 'chefs']);
    Route::post('/chefstore', [AdminController::class, 'chefstore']);
    Route::get('/chefEdit/{id}', [AdminController::class, 'chefEdit']);
    Route::post('/chefUpdate/{id}', [AdminController::class, 'chefUpdate']);

    // Cart Routes
    Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
    Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
    Route::get('/remove/{id}', [HomeController::class, 'remove']);
    Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);

    // Orders Routes
    Route::get('/orders', [AdminController::class, 'orders']);

    // Search Route
    Route::get('/search', [AdminController::class, 'search']);

});
