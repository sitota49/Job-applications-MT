<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Shared\SkillsController;
use App\Http\Controllers\API\Shared\JobsController;
use App\Http\Controllers\API\Shared\ApplicationsController;

use App\Http\Controllers\API\User\UserAuthController;
use App\Http\Controllers\API\User\UserSkillsController;
use App\Http\Controllers\API\User\UserProfileController;
use App\Http\Controllers\API\User\UserJobsController;
use App\Http\Controllers\API\User\UserApplicationsController;
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

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);


Route::get('/skills', [SkillsController::class, 'index']);
Route::get('/jobs', [JobsController::class, 'index']);
Route::get('/applications', [ApplicationsController::class, 'index']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('userSkills', UserSkillsController::class)->middleware('auth');
    Route::put('/userSkills', [UserSkillsController::class, 'update']);
    Route::resource('userProfile', UserProfileController::class)->middleware('auth');
    Route::put('/userProfile', [UserProfileController::class, 'update']);
    Route::resource('userJobs', UserJobsController::class)->middleware('auth');
    Route::resource('userApplications', UserApplicationsController::class)->middleware('auth');
    Route::post('/logout', [UserAuthController::class, 'logout']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
