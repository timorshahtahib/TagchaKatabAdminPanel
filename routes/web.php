<?php

use App\Http\Controllers\admin\NotificationController;
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
    return view('index');
})->name('site');
Route::get('/index', function () {
    return view('index');
})->name('site');
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/categories', function () {
    return view('categories');
});

//Route::get('/admin/', function () {
//    return view('admin.dashboard');
//})->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function () {





    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin');
    Route::resource('Dashboard', 'App\Http\Controllers\Admin\DashboardController');
    Route::resource('Add_Author', 'App\Http\Controllers\Admin\AuthorController');
    Route::resource('BookController', 'App\Http\Controllers\Admin\BookController');
    Route::resource('SubCategoryController', 'App\Http\Controllers\Admin\SubCategoryController');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('push-notification', [NotificationController::class, 'index']);
Route::post('sendNotification', [NotificationController::class, 'sendNotification'])->name('send.notification');
