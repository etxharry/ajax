<?php

use App\Http\Controllers\AjaxController;
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




Route::get('/show',[AjaxController::class,'index'])->name('user.show');

Route::get('/add',[AjaxController::class,'add'])->name('user.add');

Route::post('/store',[AjaxController::class,'store'])->name('user.store');

Route::get('/edit/{id}',[AjaxController::class,'edit'])->name('user.edit');

Route::post('/update/{id}',[AjaxController::class,'update'])->name('user.update');

Route::post('/delete/{id}', [AjaxController::class, 'delete'])->name('user.delete');


