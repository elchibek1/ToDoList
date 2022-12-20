<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\TasksController::class, 'index']);
Route::post('/addTask', [\App\Http\Controllers\TasksController::class, 'addTask']);
Route::post('/in-progress/{task}', [\App\Http\Controllers\TasksController::class, 'statusInProgress']);
Route::post('/done/{task}', [\App\Http\Controllers\TasksController::class, 'statusDone']);
Route::delete('/delete/{task}', [\App\Http\Controllers\TasksController::class, 'deleteTask']);
Route::get('/delete-all-tasks', [\App\Http\Controllers\TasksController::class, 'deleteAllTask']);
Route::get('/edit', [\App\Http\Controllers\TasksController::class, 'edit']);
