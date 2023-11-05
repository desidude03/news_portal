<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/news/list', [NewsController::class, 'list'])->name('news.list');
Route::post('/user/login', [LoginController::class, 'apiLogin']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/bookmark/{articleId}', [\App\Http\Controllers\BookmarkController::class, 'store']);
Route::middleware('auth:sanctum')->get('/bookmarked/list', [\App\Http\Controllers\BookmarkController::class, 'index']);
