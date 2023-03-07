<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\StudentController;
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



///===========User Ajax =========//
Route::get('/show',[AjaxController::class,'index'])->name('user.show');
Route::get('/add',[AjaxController::class,'add'])->name('user.add');
Route::post('/store',[AjaxController::class,'store'])->name('user.store');
Route::get('/edit/{id}',[AjaxController::class,'edit'])->name('user.edit');
Route::post('/update/{id}',[AjaxController::class,'update'])->name('user.update');
Route::post('/delete/{id}', [AjaxController::class, 'delete'])->name('user.delete');


///===========Student Ajax =========//
Route::get('/students',[StudentController::class,'index'])->name('student.index');
Route::post('/students',[StudentController::class,'addStudent'])->name('student.add');
Route::get('/students/{id}',[StudentController::class,'getStudentById']);
Route::post('/student',[StudentController::class,'updateStudent'])->name('student.update');
Route::delete('/students/{id}',[StudentController::class,'delete']);
Route::delete('/selected-students',[StudentController::class,'bulkdelete'])->name('student.bulkdeleted');
