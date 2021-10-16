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

Route::get('/redirects', [HomeController::class, 'redirects']);
Route::get('/users', [AdminController::class, 'user']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);


