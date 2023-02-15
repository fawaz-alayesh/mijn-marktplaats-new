<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AdvertentieController;
use Illuminate\Support\Facades\Notification;
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

Route::get('/', [PagesController::class, 'index']);

Route::resource('advertentie', AdvertentieController::class);

Route::get('/search', [AdvertentieController::class, 'search']);

Route::get('/online-status', function () {
    if (Auth::check()) {
        $status = 'online';
    } else {
        $status = 'offline';
    }
    return response()->json(['status' => $status]);
 
});

Route::post('/send-notification', function () {
    // Send the notification to the user with ID 1
    $user = User::find(1);
    $user->notify(new UserNotification);

    return 'Notification sent!';
});




Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/advertentie/{category?}/{item?}', function ($category = null, $item = null) {
//     if(isset($category)){
//      if(isset($item)){
//          return "<h1>{$item}</h1>";
//      }
//      return "<h1>{$category}</h1>";
//     }
//     return '<h1>ADVERTENTIES</h1>';
//  });