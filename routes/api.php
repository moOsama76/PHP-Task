<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeEmail;
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

Route::middleware('auth:sanctum')->get('/getUsers', [UserController::class, 'getAllUsers']);
Route::middleware('auth:sanctum')->post('/createUser', [UserController::class, 'createUser']);
Route::middleware('auth:sanctum')->delete('/deleteUser/{id}', [UserController::class, 'deleteUser']);
Route::middleware('auth:sanctum')->put('/updateUser/{id}', [UserController::class, 'updateUser']);
Route::middleware('auth:sanctum')->get('welcome', [WelcomeEmail::class, 'send']);