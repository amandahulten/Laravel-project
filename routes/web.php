<?php

use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ViewAddPhotoController;
use App\Http\Controllers\UserFormController;
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
Route::get('createaccount', UserFormController::class)->middleware('guest');
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
//feed is the landing page for logged in users
Route::get('feed', FeedController::class)->middleware('auth');
Route::post('createuser', CreateUserController::class);
Route::get('photos', [PhotosController::class, 'viewPhotos'])->middleware('auth');
Route::post('photos', [PhotosController::class, 'storePhoto'])
    ->name('photos.store');
Route::delete('delete', [PhotosController::class, 'deleteImage'])->name('delete');
Route::get('viewphoto/{id}', [PhotosController::class, 'viewSinglePhoto'])->middleware('auth');
Route::get('addphoto', ViewAddPhotocontroller::class)->middleware('auth');
Route::post('addcomment', [CommentsController::class, 'addComment'])->name('addComment');
Route::patch('like/{request}', LikesController::class)->middleware('auth');
