<?php


use App\Http\Controllers\Auth\UserRegisterAuthController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/* Authentication */
Route::group(['middleware' => 'api', 'prefix' => 'users'], function () {
    Route::post('/registration', UserRegisterAuthController::class);
   /* Route::post('/login', UserLoginAuthController::class);
    Route::post('/logout', UserLogoutAuthController::class);*/
});
