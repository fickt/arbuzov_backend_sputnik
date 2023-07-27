<?php


use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Resort\ResortController;
use App\Http\Controllers\Resort\ResortPhotoController;
use App\Http\Controllers\Resort\ResortRatingController;
use App\Http\Controllers\Resort\ResortRecommendationController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserBlockController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserPhotoController;
use App\Http\Controllers\User\UserWishlistController;
use App\Http\Middleware\CheckUserBlock;
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


/* Authorization */
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group(['as' => 'api.', 'middleware' => CheckUserBlock::class], function () {
    /* Users */
    Orion::resource('users', UserController::class)->withoutMiddleware(CheckUserBlock::class);
    Orion::resource('user-photos', UserPhotoController::class);
    Orion::resource('user-blocks', UserBlockController::class);
    Orion::resource('user-wishlist-resorts', UserWishlistController::class);
    Orion::resource('resorts', ResortController::class);

    /* Resorts */
    Orion::resource('resort-ratings', ResortRatingController::class);
    Orion::resource('resort-photos', ResortPhotoController::class);
    Orion::resource('recommendations', ResortRecommendationController::class);

    Orion::resource('notifications', NotificationController::class);

});

