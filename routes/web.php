<?php

use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PhotosController;
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



Route::view('/', 'index')->name('login')->middleware('guest');
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
//feed is the landing page for logged in users
Route::get('feed', FeedController::class)->middleware('auth');
Route::post('createuser', CreateUserController::class);
//For adding an image
Route::get('photos', [PhotosController::class, 'viewPhotos'])->middleware('auth');

//For storing an image
Route::post('photos', [PhotosController::class, 'storePhoto'])
    ->name('photos.store');


//Route::resource('photos', PhotosController::class)->middleware('auth');
