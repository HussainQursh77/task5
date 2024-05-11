<?php

use App\Http\Controllers\RateController;
use App\Http\Controllers\RatingBookController;
use App\Http\Controllers\VisitorResponse;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])
    ->middleware('auth:sanctum');


Route::get('show', [VisitorResponse::class, 'index'])->name('show');
Route::get('filtering', [VisitorResponse::class, 'filter'])->name('filtering');
Route::post('wishlist', [WishlistController::class, 'addbook'])->name('wishlist')->middleware('auth:sanctum');
Route::post('rate/', [RatingBookController::class, 'ratebook'])->name('rate')->middleware('auth:sanctum');
// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('register', [AuthController::class, 'register']);
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', [AuthController::class, 'logout']);
//     Route::post('refresh', [AuthController::class, 'refresh']);
//     Route::post('me', [AuthController::class, 'me']);

// });
