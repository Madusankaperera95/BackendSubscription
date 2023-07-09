<?php

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

Route::get('/websites',[\App\Http\Controllers\WebsiteController::class,'index'])->name('website.all');
Route::post('/website/{id}/subscribe',[\App\Http\Controllers\WebsiteController::class,'subscribe'])->name('website.subscribe');
Route::post('/createpost',[\App\Http\Controllers\PostController::class,'store'])->name('post.create');
