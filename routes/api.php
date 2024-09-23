<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CategoryController;

// Rotas para Tasks (tarefas)
Route::get('/tasks', [TaskController::class, 'index']); // GET - http://127.0.0.1:8000/api/tasks?page=1
Route::get('/tasks/{task}', [TaskController::class, 'show']); // GET - http://127.0.0.1:8000/api/tasks/1
Route::post('/tasks', [TaskController::class, 'store']); // POST - http://127.0.0.1:8000/api/tasks
Route::put('/tasks/{task}', [TaskController::class, 'update']); // PUT - http://127.0.0.1:8000/api/tasks/1
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/tasks/1

// Rotas para Categories (categorias)
Route::get('/categories', [CategoryController::class, 'index']); // GET - http://127.0.0.1:8000/api/categories?page=1
Route::get('/categories/{category}', [CategoryController::class, 'show']); // GET - http://127.0.0.1:8000/api/categories/1
Route::post('/categories', [CategoryController::class, 'store']); // POST - http://127.0.0.1:8000/api/categories
Route::put('/categories/{category}', [CategoryController::class, 'update']); // PUT - http://127.0.0.1:8000/api/categories/1
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/categories/1
