<?php
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TareaController::class, 'index']);
Route::post('/tareas', [TareaController::class, 'store']);
Route::patch('/tareas/{tarea}', [TareaController::class, 'toggle']);
Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy']);