<?php

use App\Models\Advertenties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Read Api
Route::get('/advertentie', function(){
    return Advertenties::paginate(1);
});

// Create Api
Route::post('/Advertenties', function(Request $request){

    request()->validate([
        'title' => 'required',
        'description' => 'required',
        'filename' => 'required',
    ]);

    return Advertenties::create([
        'slug' => request('slug'),
        'filename' => request('filename'),
        'title' => request('title'),
        'city' => request('city'),
        'state' => request('state'),
        'description' => request('description'),
        'price' => request('price'),
        'category' => request('category'),
        'lat' => request('lat'),
        'lng' => request('lng'),
        'created_at' => request('created_at'),
        'updated_at' => request('updated_at'),
        'user_id' => request('user_id'),

    ]);
});

// Update Api
Route::put('/Advertenties/{slug}', function(Request $request, $slug){

    request()->validate([
        'title' => 'required',
        'description' => 'required',
        'filename' => 'required',
    ]);

    return Advertenties::update([
        'slug' => request('slug'),
        'filename' => request('filename'),
        'title' => request('title'),
        'city' => request('city'),
        'state' => request('state'),
        'description' => request('description'),
        'price' => request('price'),
        'category' => request('category'),
        'lat' => request('lat'),
        'lng' => request('lng'),
        'created_at' => request('created_at'),
        'updated_at' => request('updated_at'),
        'user_id' => request('user_id'),

    ]);
});

// Delete Api
Route::delete('/Advertenties/{slug}', function( $slug){
    return Advertenties::where('slug', $slug)->delete();
});

Route::get('/User', function(){
    return User::all();
});