<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WorkController;

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
    return view('check');
});

Route::get('/Job_Title',[WorkController::class,'job']);
Route::get('/edit_job/{id}',[WorkController::class,'edit_job']);
Route::post('updatejob/{id}',[WorkController::class,'update_job']);
Route::get('delete_job/{id}',[WorkController::class,'destroy_job'])->name('delete_job');
Route::post('/Job_Title',[WorkController::class,'add_job'])->name('Job_Title');

Route::get('/Leave_Status',[WorkController::class,'leave_status']);
Route::get('/edit_status/{id}',[WorkController::class,'edit_leave_status']);
Route::post('updatestatus/{id}',[WorkController::class,'update_leave_status']);
Route::get('/delete_leave_status/{id}',[WorkController::class,'destroy_leave_status']);
Route::post('/leave_status',[WorkController::class,'add_leave_status'])->name('leave_status');

Route::get('leave',[WorkController::class,'leave']);
Route::get('/edit_leave/{id}',[WorkController::class,'edit_leave']);
Route::post('updateleave/{id}',[WorkController::class,'update_leave']);
Route::get('/delete_leave/{id}',[WorkController::class,'destroy_leave']);
Route::post('/leave',[WorkController::class,'add_leave'])->name('leave');

Route::get('/letter',[WorkController::class,'view_letter']);
Route::get('/add_letter',[WorkController::class,'addletter']);
Route::get('/edit_letter/{id}',[WorkController::class,'edit_letter']);
Route::post('updateletter/{id}',[WorkController::class,'update_letter']);
Route::get('/delete_letter/{id}',[WorkController::class,'destroy_letter']);
Route::post('/letter',[WorkController::class,'add_letter'])->name('letter');
