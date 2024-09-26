<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');


Route::view('/tasks', 'tasks')->name('tasks');
Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');


