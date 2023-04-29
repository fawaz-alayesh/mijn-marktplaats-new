<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AdvertentieController;
use \App\Http\Controllers\Auth\UpdateProfileController;
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

//Pages routes
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
//Ads route
Route::resource('advertentie', AdvertentieController::class);
//Search route
Route::get('/search', [AdvertentieController::class, 'search']);
//Auth routes
Auth::routes();
//Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');
//Category route
Route::get('/categorie/{category}', [AdvertentieController::class, 'category'])->name('advertentie.category');
//UpdateProfile route
Route::get('/update-profile', [UpdateProfileController::class, 'index'])->name('updateprofile');
Route::post('/update-profile', [UpdateProfileController::class, 'update'])->name('updateprofile.update');
