<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data=App\Models\Task::all();
    return view('task')->with('tasks',$data);
});
Route::post('/SaveTask',[TaskController::class,'store'])->name('SaveTask');
Route::get('/deletetask/{id}',[TaskController::class,'DeleteTask']);
Route::get('/updatetask/{id}',[TaskController::class,'UpdateTask']);
Route::post('/updatetaskagain',[TaskController::class,'UpdateTaskview']);
Route::get('/search',[TaskController::class,'search']);