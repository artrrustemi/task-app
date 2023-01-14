<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TasksController;
use App\Http\Controllers\Api\SubTasksController;
use App\Http\Controllers\Api\AuthController;

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





Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::prefix('tasks')->group(function () {
        Route::post('/', [TasksController::class, 'store'])->name('add.task');
        Route::put('/{id}', [TasksController::class, 'update'])->name('update.task');
        Route::get('/', [TasksController::class, 'index'])->name('all.tasks');
        Route::get('/{id}', [TasksController::class, 'show'])->name('id.task');
        Route::delete('/{id}', [TasksController::class, 'destroy'])->name('delete.task');
        Route::get('/search', [TasksController::class, 'searchTask'])->name('search.tasks');
        Route::get('/sort', [TasksController::class, 'sortTask'])->name('sort.tasks');
   
   
        Route::prefix('subtask')->group(function () {
            Route::post('/', [SubTasksController::class, 'store'])->name('add.subtask');
            Route::put('/{id}', [SubTasksController::class, 'update'])->name('update.subtask');
            Route::delete('/{id}', [SubTasksController::class, 'destroy'])->name('destroy.subtask');
        });
    });
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);