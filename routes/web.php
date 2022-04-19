<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;

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
//departments
Route::get('/departments',[EmployeeController::class,'show_departments'])->name('departments');
Route::get('/deletedepartment/{DepartmentID}',[EmployeeController::class,'deletedepartment']);
Route::post('/adddepartments',[EmployeeController::class,'add_department'])->name('adddepartments');

//educationlevels
Route::get('/educationlevels',[EmployeeController::class,'educationlevels'])->name('educationlevels');
Route::post('/addeducationlevels',[EmployeeController::class,'add_educationlevels'])->name('addeducationlevels');
Route::get('/deleteeducationlevel/{EducationLevelID}',[EmployeeController::class,'deleteeducationlevel']);
//documents
Route::get('/documents',[EmployeeController::class,'documents'])->name('documents');
Route::post('/uploaddocument',[EmployeeController::class,'add_documents'])->name('uploaddocument');

//stafftype
Route::get('/stafftype',[EmployeeController::class,'stafftype'])->name('stafftype');
Route::post('/addstafftype',[EmployeeController::class,'addstafftype'])->name('addstafftype');
Route::get('/deletestafftype/{EducationLevelID}',[EmployeeController::class,'deletestafftype']);

//Title
Route::get('/title',[EmployeeController::class,'title'])->name('title');
Route::post('/addtitle',[EmployeeController::class,'addtitle'])->name('addtitle');
Route::get('/deletetitle/{TitleID}',[EmployeeController::class,'deletetitle']);

//employee
Route::get('/employee',[EmployeeController::class,'showemployees'])->name('showemployee');
Route::get('/employeeform',[EmployeeController::class,'employeeform'])->name('employeeform');
Route::post('/addemployee',[EmployeeController::class,'addemployee'])->name('addemployee');
Route::get('/editemployee/{EmployeeID}',[EmployeeController::class,'editemployee']);
Route::post('/updateemployee',[EmployeeController::class,'updateemployee'])->name('updateemployee');
Route::get('/deleteemployee/{EmployeeID}',[EmployeeController::class,'deletemployee']);



Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/check', [LoginController::class, 'UserVerify'])->name('auth.check');
Route::get('/admin_dashboard', [LoginController::class, 'admin_dashboard'])->name('auth.admin_dashboard');
Route::get('/employ_dashboard', [LoginController::class, 'employ_dashboard'])->name('auth.employ_dashboard');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/', function () {
    return view('home');
});

