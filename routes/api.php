<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskPriorityController;
use App\Http\Controllers\TaskStatusController;
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

Route::get('task/statuses', TaskStatusController::class)->name('task.statuses');
Route::get('task/priorities', TaskPriorityController::class)->name('task.priorities');

Route::apiResource('tasks', TaskController::class);
