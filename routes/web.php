<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SkillsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Company\JobsController;
use App\Http\Controllers\Company\ApplicationsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('skill', SkillsController::class)->middleware('isAdmin');
Route::resource('role', RolesController::class);
Route::resource('user', UsersController::class);



Route::resource('register', RegisterController::class);

Route::resource('company/jobs', JobsController::class);
Route::get('company/profile',[JobsController::class,'profile']);

Route::resource('company/applications',ApplicationsController::class);


Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
