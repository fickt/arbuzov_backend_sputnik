<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResortPhotoController;
use App\Http\Controllers\ResortRatingController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\ResortRecommendationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\UserWishlistController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group(['as' => 'api.'], function () {
    Orion::resource('users', UserController::class);
    Orion::resource('user-photos', UserPhotoController::class);
    Orion::resource('resorts', ResortController::class);
    Orion::resource('user-wishlist-resorts', UserWishlistController::class);
    Orion::resource('resort-ratings', ResortRatingController::class);
    Orion::resource('resort-photos', ResortPhotoController::class);
    Orion::resource('recommendations', ResortRecommendationController::class);
    Orion::resource('user-blocks', UserBlockController::class);
});

