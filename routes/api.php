<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/tasks', 'tasks')->name('tasks');

Route::post('/register', function (Request $request) {
// TODO: make logic for registration
return response()->json(['message' => 'User registered successfully'], 200);
});
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/tasks', [TaskController::class, 'create']);
