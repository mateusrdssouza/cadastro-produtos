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

Route::get('/', function () {
	return redirect()->route('home');
});

/**
 * Authentication routes
 */
Auth::routes();

/**
 * Home routes
 */
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Product routes
 */
Route::resource('product', App\Http\Controllers\ProductController::class);

/**
* Tag routes
*/
Route::resource('tag', App\Http\Controllers\TagController::class);

/**
 * Report routes
 */
Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
