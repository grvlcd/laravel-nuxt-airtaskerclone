<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
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
    if(isset($user->profile)) {
        $user->profile;
    }
    if(isset($user->profile->skills)) {
        $user->profile->skills;
    }
    if(isset($user->profile->educations)) {
        $user->profile->educations;
    }
    if(isset($user->profile->experiences)) {
        $user->profile->experiences;
    }
    return $user;
});

// User Routes -------------------------------------------------------------
Route::apiResource('profiles', ProfileController::class)->only(['show', 'update']);

// Experience Routes--------------------------------------------------
Route::apiResource('experiences', ExperienceController::class)->only(['store', 'update', 'destroy']);

// Education Routes -------------------------------------------------------
Route::apiResource('educations', EducationController::class)->only(['store', 'update', 'destroy']);

// Skill Routes ---------------------------------------------
Route::apiResource('skills', SkillController::class)->only(['store', 'update', 'destroy']);

// Task Routes -------------------------------------------------------------
Route::apiResource('tasks', TaskController::class);

// Comment Routes ----------------------------------------------------------
Route::apiResource('comments', CommentController::class)->only(['store', 'update', 'destroy']);

// Public Routes -----------------------------------------------------------
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'store']);
