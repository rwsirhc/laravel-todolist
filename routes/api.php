<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\JWTAuthMiddleware;
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

// Route::middleware('auth')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('users/register', [UserController::class, 'register'])->middleware(JWTAuthMiddleware::class);
Route::post('users/login', [UserController::class, 'login']);
