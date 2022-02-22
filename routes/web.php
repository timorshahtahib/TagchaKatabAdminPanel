<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('index');
//})->name('site');
//Route::get('/index', function () {
//    return view('index');
//})->name('site');
//Route::get('/about', function () {
//    return view('about');
//});
//
//Route::get('/contact', function () {
//    return view('contact');
//});
//Route::get('/blog', function () {
//    return view('blog');
//});
//Route::get('/categories', function () {
//    return view('categories');
//});

//Route::get('/admin/', function () {
//    return view('admin.dashboard');
//})->middleware('auth');

Route::prefix('/')->middleware('auth')->group(function () {


    Route::get('push-notification', [NotificationController::class, 'index'])->name('push-notification');
    Route::post('sendNotification', [NotificationController::class, 'sendNotification'])->name('send.notification');


    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/Dashboard', [DashboardController::class, 'index'])->name('admin');


    Route::resource('/Add_Author', AuthorController::class);
    Route::resource('/BookController', BookController::class);
    Route::resource('/SubCategoryController', SubCategoryController::class);



});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




