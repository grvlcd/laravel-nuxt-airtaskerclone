<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Models\User;

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
    $user = User::with(['profile'])->where('id', '=', $request->user()->id)->get()->first();
    $user->profile->skills;
    $user->profile->educations;
    $user->profile->experiences;
    return $user;
});

// User Routes -------------------------------------------------------------
Route::apiResource('profiles', ProfileController::class)->only(['show', 'update']);

// Task Routes -------------------------------------------------------------
Route::apiResource('tasks', TaskController::class);

// Comment Routes ----------------------------------------------------------
Route::apiResource('comments', CommentController::class)->only(['store', 'update', 'destroy']);

// Public Routes -----------------------------------------------------------
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'store']);
