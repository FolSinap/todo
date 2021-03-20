<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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
})->middleware('guest');

Auth::routes();

Route::middleware('auth')->group(function(){
  Route::get('/tasks', [TasksController::class, 'index'])->name('home');
  Route::post('/tasks', [TasksController::class, 'store']);
  Route::delete('/tasks/{task}/delete', [TasksController::class, 'destroy']);
  Route::get('/tasks/{task}/edit', [TasksController::class, 'edit']);
  Route::patch('/tasks/{task}/edit', [TasksController::class, 'update']);

  Route::patch('/tasks/{task}/done', [TasksController::class, 'done']);
  Route::delete('/tasks/clear', [TasksController::class, 'clear']);
});
