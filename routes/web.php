<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;



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
});

Route::get('/task',[TaskController::class,'index'])->name('index');
    Route::post('/task',[TaskController::class,'create'])->name('create');
    Route::get('/task/edit/{id}',[TaskController::class,'edit'])->name('edit');
    Route::put('/task/edit/{id}',[TaskController::class,'update'])->name('update');
    Route::get('/task/delete/{id}',[TaskController::class,'destroy'])->name('destroy');



Route::get('/project',[ProjectController::class,'index'])->name('index');
Route::post('/project',[ProjectController::class,'create'])->name('create');
Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('edit');
Route::put('/project/edit/{id}',[ProjectController::class,'update'])->name('update');
Route::get('/project/delete/{id}',[ProjectController::class,'destroy'])->name('destroy');
