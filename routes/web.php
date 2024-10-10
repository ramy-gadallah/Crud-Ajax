<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('create',[TestController::class,'create'])->name('create');
Route::Post('test.store',[TestController::class,'test_store'])->name('test.store');
Route::get('index',[TestController::class,'index'])->name('index');
Route::post('delete',[TestController::class,'delete'])->name('delete');

Route::get('edit/{id}',[TestController::class,'edit'])->name('edit');
Route::Post('update',[TestController::class,'update'])->name('update');




