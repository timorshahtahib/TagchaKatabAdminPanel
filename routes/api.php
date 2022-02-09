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
Route::get('/Sub/{Category}', [APIController::class, 'getSubCategory']);
Route::get('/authors', [APIController::class, 'authors']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
