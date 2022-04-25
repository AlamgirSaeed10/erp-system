<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\WorkController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;

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
Route::get('/employeedetail/{EmployeeID}',[EmployeeController::class,'view_employee']);


Route::get('/', [LoginController::class, 'login'])->name('auth.login');
Route::post('/check', [LoginController::class, 'UserVerify'])->name('auth.check');
Route::get('/admin_dashboard', [LoginController::class, 'admin_dashboard'])->name('auth.admin_dashboard');
// Route::get('/employ_dashboard', [LoginController::class, 'employ_dashboard'])->name('employ_dashboard');
// Route::get('/employ_dashboard', [LoginController::class, 'hr_dashboard'])->name('auth.hr_dashboard');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Route::get('/', function () {
//     return view('check');
// });

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


//EmployeeSide
Route::get('/Report',[WorkController::class,'report']);
Route::post('/Report',[WorkController::class,'add_report'])->name('Report');
Route::get('/edit_report/{id}',[WorkController::class,'edit_report']);
Route::post('updatereport/{id}',[WorkController::class,'update_report']);
Route::get('/delete_report/{id}',[WorkController::class,'destroy_report']);
// employ section
Route::view('/employ_dashboard', 'employe_section/dashboard')->name('employ_dashboard');
Route::get('employeeprofile/{id}',[WorkController::class,'employeeprofile']);
//Employee Documents
Route::get('/employeedocuments',[EmployeeController::class,'EmployeeDocuments'])->name('employeedocuments');
Route::post('employeedocumentsupload',[EmployeeController::class,'EmployeeDocumentsUpload'])->name('EmployeeDocumentUpload');
Route::get('/delete_emp_documents/{id}',[EmployeeController::class,'Deletedocuments']);


//Employeeleave

Route::get('/employeeleave',[EmployeeController::class,'Employeeleave'])->name('employeeleave');
Route::post('/employeeleavesave',[EmployeeController::class,'EmployeeLeaveSave'])->name('empLeaveSave');
Route::get('/empleaveedit/{id}',[EmployeeController::class,'EmployeeLeaveEdit']);
Route::post('/employeeleaveupdate',[EmployeeController::class,'EmployeeLeaveUpdate'])->name('empLeaveUpdate');
Route::get('/delete_emp_leave/{id}',[EmployeeController::class,'Deleteleave']);

//E,ployee loan

Route::get('/employeeloan',[EmployeeController::class,'Employeeloan'])->name('Employeeloan');
Route::post('/employeeloansave',[EmployeeController::class,'Employeeloansave'])->name('EmployeeloanSave');

Route::get('/Emp_letter',[WorkController::class,'blank_page']);

Route::get('/email', [App\Http\Controllers\EmailController::class, 'create']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');

Route::get('IssueLetter',[WorkController::class,'IssueLetter']);
Route::get('IssueLetter',[WorkController::class,'letter_issue_preview']);
Route::post('letter_issue_preview',[WorkController::class,'letter_issue_preview'])->name('letter_issue_preview');
Route::post('letter_issue_save',[WorkController::class,'letter_issue_save'])->name('letter_issue_save');
Route::get('/delete_issue_letter/{id}',[WorkController::class,'destroy_issue_letter']);
Route::get('/edit_letter_issue/{id}',[WorkController::class,'edit_letter_issue']);
Route::post('updateletterissue/{id}',[WorkController::class,'update_letter_issue']);
Route::get('/issue_letter_print/{id}',[WorkController::class,'issue_letter_print']);

Route::get('EmployeeAttendance',[WorkController::class,'EmployeeAttendances']);

Route::get('employe_att',[WorkController::class,'emplo_att']);
Route::post('employe_att',[WorkController::class,'add_emplo'])->name('employe_att');

Route::get('EmployeeWarningLeter',[WorkController::class,'employeewarningletter']);

Route::get('salary/{id}',[WorkController::class,'employeesalary']);

// Route::group(['middleware'=>['AuthCheck']],function(){
    
// });
Route::group(['middleware' => ['AuthCheck']], function () {
    Route::view('/employ_dashboard', 'employe_section/dashboard')->name('employ_dashboard');
});


// !............Product Section......................!
Route::get('/product',[ProductController::class,'showproducts'])->name('showproducts');
Route::get('/productform',[ProductController::class,'productform'])->name('productform');
Route::post('/addproduct',[ProductController::class,'addproduct'])->name('addproduct_data');
Route::get('/editproduct/{ProductID}',[ProductController::class,'editproduct']);
Route::post('/updateproduct',[ProductController::class,'updateproduct'])->name('updateproduct');
Route::get('/deleteproduct/{ProductID}',[ProductController::class,'deletproduct']);
Route::get('/productedetail/{ProductID}',[ProductController::class,'view_product']);
Route::post('salary',[WorkController::class,'addemployeesalary'])->name('addemployeesalary');
