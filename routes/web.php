<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',function (){
    return view('layouts/app');
});


//admin

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('/adminview', [\App\Http\Controllers\AdminController::class,'index'])->name('adminview');
    Route::resource('/adminadd',\App\Http\Controllers\BookController::class);
    Route::get('/adminedit/{id}', [\App\Http\Controllers\BookController::class, 'edit']);
    Route::Patch('/adminedit/{id}', [\App\Http\Controllers\BookController::class, 'update']);
    Route::Delete('/adminview/{id}', [\App\Http\Controllers\BookController::class, 'destroy']);
//    Route::get('/adminadd', [\App\Http\Controllers\AdminController::class,'create'])->name('adm   inadd');
//    Route::get('/adminview', [\App\Http\Controllers\AdminController::class,'index'])->name('adminview');
//    Route::resource('/addbooks', \App\Http\Controllers\AdminController::class);
    Route::resource('/borrow', \App\Http\Controllers\BorrowController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/search',[\App\Http\Controllers\HomeController::class, 'search']);
