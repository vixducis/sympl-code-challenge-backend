<?php

use App\Http\Controllers\ProjectAssignmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

Route::resource('/users', UserController::class);
Route::resource('/projects', ProjectController::class);
Route::post('/users/{userid}/project/{projectid}', [ProjectAssignmentController::class, 'store']);
Route::delete('/users/{userid}/project/{projectid}', [ProjectAssignmentController::class, 'destroy']);
