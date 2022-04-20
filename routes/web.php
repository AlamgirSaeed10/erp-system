<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\WorkController;
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
Route::post('/updatedepartment',[EmployeeController::class,'updatedepartment'])->name('updatedepartment');
Route::get('/editdepartment/{DepartmentID}',[EmployeeController::class,'editdepartment']);
//educationlevels
Route::get('/educationlevels',[EmployeeController::class,'educationlevels'])->name('educationlevels');
Route::post('/addeducationlevels',[EmployeeController::class,'add_educationlevels'])->name('addeducationlevels');
Route::get('/deleteeducationlevel/{EducationLevelID}',[EmployeeController::class,'deleteeducationlevel']);
Route::post('/updateeducationlevel',[EmployeeController::class,'updateeducationlevel'])->name('updateeducationlevel');
Route::get('/editeducationlevel/{EducationLevelID}',[EmployeeController::class,'editeducationlevel']);
//documents
Route::get('/documents',[EmployeeController::class,'documents'])->name('documents');
Route::post('/uploaddocument',[EmployeeController::class,'add_documents'])->name('uploaddocument');

//stafftype
Route::get('/stafftype',[EmployeeController::class,'stafftype'])->name('stafftype');
Route::post('/addstafftype',[EmployeeController::class,'addstafftype'])->name('addstafftype');
Route::get('/deletestafftype/{StaffTypeID}',[EmployeeController::class,'deletestafftype']);
Route::post('/updatestafftype',[EmployeeController::class,'updatestafftype'])->name('updatestafftype');
Route::get('/editstafftype/{StaffTypeID}',[EmployeeController::class,'editstafftype']);
//Title
Route::get('/title',[EmployeeController::class,'title'])->name('title');
Route::post('/addtitle',[EmployeeController::class,'addtitle'])->name('addtitle');
Route::get('/deletetitle/{TitleID}',[EmployeeController::class,'deletetitle']);
Route::post('/updatetitle',[EmployeeController::class,'updatetitle'])->name('updatetitle');
Route::get('/edittitle/{TitleID}',[EmployeeController::class,'edittitle']);
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

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/customer', 'customer')->name('customer');
