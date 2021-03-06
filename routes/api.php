<?php

use App\Http\Controllers\admin\APIController;
use App\Models\Book;
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


Route::get('/books', [APIController::class, 'index']);
Route::get('/books/{id}', [APIController::class, 'getBookByID']);
Route::get('/author/{id}/books', [APIController::class, 'getBookByAuthor']);
Route::get('/category/{Category}/subcategory', [APIController::class, 'getSubCategory']);
Route::get('/category', [APIController::class, 'geCategory']);
Route::get('/book_by_category/{id}', [APIController::class, 'getNewBookByCategory']);
Route::get('/book_by_category_hot/{id}', [APIController::class, 'getHotBookByCategory']);
Route::get('/book_by_sub_category/{id}', [APIController::class, 'getNewBookBySubCategory']);
Route::get('/search/{name}', [APIController::class, 'search']);
Route::get('/authors', [APIController::class, 'authors']);
Route::get('/hotBook', [APIController::class, 'HotBooks']);
Route::post('/login', [APIController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
