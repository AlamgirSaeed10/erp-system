<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use Session;
use URL;
use Image;
use Excel;
use File;
use PDF;

class EmployeeController extends Controller
{
    function show_departments()
    {
        $departments = DB::table('department')
            ->select('*')
            ->get();
        return view('employee.department', compact('departments'));
    }
    function add_department(Request $request)
    {
        $this->validate($request, [
            'departmentname' => 'required|max:30',
        ]);

        $department = $request->departmentname;
        DB::table('department')->insert([
            'DepartmentName' => $department
        ]);
        return redirect()->back();
    }
    function deletedepartment($DepartmentID)
    {
        DB::delete('delete from department where DepartmentID = ?', [$DepartmentID]);
        return redirect()->back();
    }
    function editdepartment($DepratmentID)
    {
        $department = DB::select('select * from department where DepartmentID = ?',[$DepratmentID]);
      
        return view('employee/editdepartment', compact('department'));
    }
     function updatedepartment(Request $request)
    {

        $DepartmentID = $request->DepartmentID;
        $DepartmentName = $request->departmentname;

        DB::update('update department set DepartmentName = ? where DepartmentID = ?',[$DepartmentName,$DepartmentID]);
        return redirect('departments');
    }

    function educationlevels()
    {
        $educationlevels = DB::table('educationlevel')->get();
        return view('employee.educationlevel', compact('educationlevels'));
    }
    function add_educationlevels(Request $request)
    {
        $this->validate($request, [
            'educationlevel' => 'required|max:30',
        ]);

        $educationlevel = $request->educationlevel;
        DB::table('educationlevel')->insert([
            'EducationLevelName' => $educationlevel
        ]);
        return redirect()->back();
    }
    function deleteeducationlevel($EducationLevelID)
    {

        DB::delete('delete from educationlevel where EducationLevelID = ?', [$EducationLevelID]);
        return redirect()->back();
    }
    function editeducationlevel($EducationLevelID)
    {
        $educationlevel = DB::select('select * from educationlevel where EducationLevelID = ?',[$EducationLevelID]);
      
        return view('employee/edit_educationlevel',['educationlevel'=> $educationlevel]);
    }
     function updateeducationlevel(Request $request)
    {

        $EducationLevelID = $request->EducationLevelID;
        $EducationLevelName = $request->EducationLevelName;

        DB::update('update educationlevel set EducationLevelName = ? where EducationLevelID = ?',[ $EducationLevelName, $EducationLevelID]);
        return redirect('educationlevels');
    }
    
    function documents()
    {
        $documents = DB::table('documents')->get();
        $employees  =  DB::table('employee')->select('employee.EmployeeID', 'employee.FirstName')->get();
        return view('employee.documents', compact('documents', 'employees'));
    }

    function add_documents(Request $request)
    {
        $this->validate($request, [
            'employee' => 'required|max:30',
            'filename' => 'required|max:30',
            'file' => 'required|max:1024'
        ]);

        $employee = $request->employee;
        $filename = $request->filename;
        $file = $request->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/employee_documents';
            $storage = $file->move($destinationPath, $fileName);

            $data = array(
                'EmployeeID' => $employee,
                "FileName" => $filename,
                "file" => $fileName
            );

            DB::table('documents')->insert($data);
        }

        return redirect()->back();
    }

    function stafftype()
    {
        $stafftype = DB::table('staff_type')->get();
        // dd($stafftype);
        return view('employee.stafftype', compact('stafftype'));
    }

    function addstafftype(Request $request)
    {
        $this->validate($request, [
            'stafftype' => 'required|max:30',
        ]);
        $stafftype = $request->stafftype;
        DB::table('staff_type')->insert([
            'StaffType' => $stafftype
        ]);
        return redirect()->back();
    }
    function deletestafftype($StaffTypeID)
    {
        DB::delete('delete from staff_type where StaffTypeID = ?', [$StaffTypeID]);
        return redirect()->back();
    }

    function editstafftype($StaffTypeID)
    {
        $staff = DB::select('select * from staff_type where StaffTypeID = ?',[$StaffTypeID]);
      
        return view('employee/edit_staff', compact('staff'));
    }

    function updatestafftype(Request $request)
    {

        $StaffTypeID = $request->StaffTypeID;
        $StaffType = $request->StaffType;

        DB::update('update staff_type set StaffType = ? where StaffTypeID = ?',[ $StaffType, $StaffTypeID]);
        return redirect('stafftype');
    }

    function title()
    {
        $titles = DB::table('title')->get();

        return view('employee.title', compact('titles'));
    }
    function addtitle(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
        ]);
        $title = $request->title;
        DB::table('title')->insert([
            'Title' =>  $title
        ]);
        return redirect()->back();
    }
    function deletetitle($TitleID)
    {
        DB::delete('delete from title where TitleID = ?', [$TitleID]);
        return redirect()->back();
    }
    function edittitle($TitleID)
    {
        $title = DB::select('select * from title where TitleID = ?',[$TitleID]);
      
        return view('employee/edit_title', compact('title'));
    }

    function updatetitle(Request $request)
    {

        $TitleeID = $request->TitleID;
        $Title = $request->Title;

        DB::update('update title set Title = ? where TitleID = ?',[ $Title, $TitleeID]);
        return redirect('title');
    }
    function showemployees(Request $request)
    {


        if ($request->ajax()) {
            $data =DB::table('employee')
            ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
            ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
            ->select('employee.EmployeeID','employee.Title','employee.FirstName','employee.MiddleName','employee.LastName', 'jobtitle.JobTitleName', 'department.DepartmentName')
            ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="editemployee/'.$row->EmployeeID.'" class="btn btn-sm edit" title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a  href ="employeedetail/'.$row->EmployeeID.'" class="btn btn-sm edit" title="Edit">
                           <i class="fas fa-eye"></i>

                       </a>  <a href ="#" onclick="delete_employee(' . $row->EmployeeID . ')" class="btn  btn-sm edit waves-effect waves-light" title="Edit" id="sa-params">
                       <i class="fas fa-trash-alt"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
            return view('employee.employee');
        }



        function employeeform()
        {
            $educationlevel = DB::table('educationlevel')->get();
            $department = DB::table('department')->get();
            $stafftype = DB::table('staff_type')->get();
            $title = DB::table('title')->get();
            $jobtitle = DB::table('jobtitle')->get();
            return view('employee.addemployee', compact('educationlevel', 'department', 'stafftype', 'title', 'jobtitle'));
        }


    function addemployee(Request $request)
    {
        
       
        $data['IsSupervisor']=$request->IsSupervisor;    
        $data['Title']=$request->Title;
      
        $data['StaffType']=$request->StaffType;
        $data['FirstName']=$request->FirstName;
        $data['MiddleName']=$request->MiddleName;
        $data['LastName']=$request->LastName;
        $data['DateOfBirth']=$request->DateOfBirth;
        $data['Gender']=$request->Gender;
        $data['Email']=$request->Email;
        $data['Nationality']=$request->Nationality;
        $data['Nationality']=$request->MobileNo;
        $data['MobileNo']=$request->HomePhone;
        $data['FullAddress']=$request->FullAddress;
        $data['EducationLevel']=$request->EducationLevel;
        $data['LastDegree']=$request->LastDegree;
        $data['MaritalStatus']=$request->MaritalStatus;
       
        $data['SpouseName']=$request->SpouseName;
        $data['SpouseEmployer']=$request->SpouseEmployer;
        $data['SpouseWorkPhone']=$request->SpouseWorkPhone;
        $data['VisaIssueDate']=$request->VisaIssueDate;
        $data['SpouseEmployer']=$request->SpouseEmployer;
        $data['VisaExpiryDate']=$request->VisaExpiryDate;
        $data['PassportNo']=$request->PassportNo;
        $data['PassportExpiry']=$request->PassportExpiry;
        
        $data['NextofKinName']=$request->NextofKinName;
        $data['NextofKinAddress']=$request->NextofKinAddress;
        $data['NextofKinPhone']=$request->NextofKinPhone;
        $data['NextofKinRelationship']=$request->NextofKinRelationship;
        $data['JobTitleID']=$request->JobTitleID;
        $data['DepartmentID']=$request->DepartmentID;
        $data['SupervisorID']=$request->SupervisorID;
        $data['WorkLocation']=$request->WorkLocation;
        $data['EmailOffical']=$request->EmailOffical;
        $data['WorkLocation']=$request->WorkLocation;
        $data['WorkPhone']=$request->WorkPhone;
        $data['eDate']=$request->StartDate;
        $data['Password']=$request->Password;
        
    
  
      
        if ($request->hasFile('Uploadpicture'))
        {


            $data['IsSupervisor'] = $request->IsSupervisor;
            $data['Title'] = $request->Title;

            $data['StaffType'] = $request->StaffType;
            $data['FirstName'] = $request->FirstName;
            $data['MiddleName'] = $request->MiddleName;
            $data['LastName'] = $request->LastName;
            $data['DateOfBirth'] = $request->DateOfBirth;
            $data['Gender'] = $request->Gender;
            $data['Email'] = $request->Email;
            $data['Nationality'] = $request->Nationality;
            $data['Nationality'] = $request->MobileNo;
            $data['MobileNo'] = $request->HomePhone;
            $data['FullAddress'] = $request->FullAddress;
            $data['EducationLevel'] = $request->EducationLevel;
            $data['LastDegree'] = $request->LastDegree;
            $data['MaritalStatus'] = $request->MaritalStatus;

            $data['SpouseName'] = $request->SpouseName;
            $data['SpouseEmployer'] = $request->SpouseEmployer;
            $data['SpouseWorkPhone'] = $request->SpouseWorkPhone;
            $data['VisaIssueDate'] = $request->VisaIssueDate;
            $data['SpouseEmployer'] = $request->SpouseEmployer;
            $data['VisaExpiryDate'] = $request->VisaExpiryDate;
            $data['PassportNo'] = $request->PassportNo;
            $data['PassportExpiry'] = $request->PassportExpiry;

            $data['NextofKinName'] = $request->NextofKinName;
            $data['NextofKinAddress'] = $request->NextofKinAddress;
            $data['NextofKinPhone'] = $request->NextofKinPhone;
            $data['NextofKinRelationship'] = $request->NextofKinRelationship;
            $data['JobTitleID'] = $request->JobTitleID;
            $data['DepartmentID'] = $request->DepartmentID;
            $data['SupervisorID'] = $request->SupervisorID;
            $data['WorkLocation'] = $request->WorkLocation;
            $data['EmailOffical'] = $request->EmailOffical;
            $data['WorkLocation'] = $request->WorkLocation;
            $data['WorkPhone'] = $request->WorkPhone;
            $data['eDate'] = $request->StartDate;
            $data['Password'] = $request->Password;

            //    $data = array(

            //     'FirstName' => $request->FirstName, 
            //     'LastNAme' => $request->LastNAme, 
            //     'Age' => $request->Age, 


            //     );

            if ($request->hasFile('Uploadpicture')) {
                $file = $request->file('Uploadpicture');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/employee_pictures';
                $storage = $file->move($destinationPath, $fileName);

                $data['Picture'] = $fileName;
            }

            DB::table('employee')->insert($data);
            return view('employee.employee');
        }

        function editemployee($EmployeeID)
        {
            $educationlevel = DB::table('educationlevel')->get();
            $department = DB::table('department')->get();
            $stafftype = DB::table('staff_type')->get();
            $title = DB::table('title')->get();
            $jobtitle = DB::table('jobtitle')->get();

            $employee =  DB::table('employee')->where('EmployeeID', $EmployeeID)->get();

            return view('employee.editemployee', compact('employee', 'educationlevel', 'department', 'stafftype', 'title', 'jobtitle'));
        }

        function updateemployee(Request $request)
        {

            if ($request->hasFile('newpicture')) {
                $file = $request->file('newpicture');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/employee_pictures';
                $storage = $file->move($destinationPath, $fileName);
            } else {
                $filename = $request->oldpicture;
            }

            $data = array(
                'IsSupervisor' => $request->IsSupervisor,
                'Title' => $request->Title,
                'StaffType' => $request->StaffType,
                'FirstName' => $request->FirstName,
                'MiddleName' => $request->MiddleName,
                'LastName' => $request->LastName,
                'DateOfBirth' => $request->DateOfBirth,
                'Gender' => $request->Gender,
                'Email' => $request->Email,
                'Nationality' => $request->Nationality,
                'Nationality' => $request->MobileNo,
                'MobileNo' => $request->HomePhone,
                'FullAddress' => $request->FullAddress,
                'EducationLevel' => $request->EducationLevel,
                'LastDegree' => $request->LastDegree,
                'MaritalStatus' => $request->MaritalStatus,
                'SpouseName' => $request->SpouseName,
                'SpouseEmployer' => $request->SpouseEmployer,
                'SpouseWorkPhone' => $request->SpouseWorkPhone,
                'VisaIssueDate' => $request->VisaIssueDate,
                'SpouseEmployer' => $request->SpouseEmployer,
                'VisaExpiryDate' => $request->VisaExpiryDate,
                'PassportNo' => $request->PassportNo,
                'PassportExpiry' => $request->PassportExpiry,
                'NextofKinName' => $request->NextofKinName,
                'NextofKinAddress' => $request->NextofKinAddress,
                'NextofKinPhone' => $request->NextofKinPhone,
                'NextofKinRelationship' => $request->NextofKinRelationship,
                'JobTitleID' => $request->JobTitleID,
                'DepartmentID' => $request->DepartmentID,
                'SupervisorID' => $request->SupervisorID,
                'WorkLocation' => $request->WorkLocation,
                'EmailOffical' => $request->EmailOffical,
                'WorkLocation' => $request->WorkLocation,
                'WorkPhone' => $request->WorkPhone,
                'eDate' => $request->StartDate,
                'Picture' => $fileName,
                'Password' => $request->Password,

            );



            $id = DB::table('employee')->where('EmployeeID', $request->EmployeeID)->update($data);


            return view('employee.employee');
        }
        function deletemployee($EmployeeID)
        {
            DB::delete('delete from employee where EmployeeID = ?', [$EmployeeID]);
            return redirect()->back();
        }
    }
    function editemployee($EmployeeID)
    {
        $educationlevel = DB::table('educationlevel')->get();
        $department = DB::table('department')->get();
        $stafftype = DB::table('staff_type')->get();
        $title = DB::table('title')->get();
        $jobtitle = DB::table('jobtitle')->get();

        $employee=  DB::table('employee')->where('EmployeeID' , $EmployeeID)->get();
       
        return view('employee.editemployee' , compact('employee','educationlevel', 'department' , 'stafftype' , 'title' , 'jobtitle'));
    }

    function updateemployee(Request $request)
    {
        
        if ($request->hasFile('newpicture'))
        {
            $file = $request->file('newpicture') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/employee_pictures';
            $storage= $file->move($destinationPath,$fileName);

          
            
           
        
        }
        else
        {
            $fileName=$request->oldpicture;
        }

        $data = array (
        'IsSupervisor'=> $request->IsSupervisor,    
        'Title'=> $request->Title,
        'StaffType'=> $request->StaffType,
        'FirstName'=> $request->FirstName,
        'MiddleName'=> $request->MiddleName,
        'LastName'=> $request->LastName,
        'DateOfBirth'=> $request->DateOfBirth,
        'Gender'=> $request->Gender,
        'Email'=> $request->Email,
        'Nationality'=> $request->Nationality,
        'Nationality'=> $request->MobileNo,
        'MobileNo'=> $request->HomePhone,
        'FullAddress'=> $request->FullAddress,
        'EducationLevel'=> $request->EducationLevel,
        'LastDegree'=> $request->LastDegree,
        'MaritalStatus'=> $request->MaritalStatus,
        'SpouseName'=> $request->SpouseName,
        'SpouseEmployer'=> $request->SpouseEmployer,
        'SpouseWorkPhone'=> $request->SpouseWorkPhone,
        'VisaIssueDate'=> $request->VisaIssueDate,
        'SpouseEmployer'=> $request->SpouseEmployer,
        'VisaExpiryDate'=> $request->VisaExpiryDate,
        'PassportNo'=> $request->PassportNo,
        'PassportExpiry'=> $request->PassportExpiry,
        'NextofKinName'=> $request->NextofKinName,
        'NextofKinAddress'=> $request->NextofKinAddress,
        'NextofKinPhone'=> $request->NextofKinPhone,
        'NextofKinRelationship'=> $request->NextofKinRelationship,
        'JobTitleID'=> $request->JobTitleID,
        'DepartmentID'=> $request->DepartmentID,
        'SupervisorID'=> $request->SupervisorID,
        'WorkLocation'=> $request->WorkLocation,
        'EmailOffical'=> $request->EmailOffical,
        'WorkLocation'=> $request->WorkLocation,
        'WorkPhone'=> $request->WorkPhone,
        'eDate'=> $request->StartDate,
        'Picture'=> $fileName ,
        'Password'=> $request->Password,

        );
        
       

        $id = DB::table('employee')->where('EmployeeID', $request->EmployeeID)->update($data);
        
   
        return view('employee.employee');
    }

    function deletemployee($EmployeeID)
    {
        dd('heelo');
        DB::delete('delete from employee where EmployeeID = ?',[$EmployeeID]);
        return redirect()->back();
    }

    function view_employee($EmployeeID)
    {
        $employee =DB::table('employee')
        ->join('department', 'employee.DepartmentID', 'department.DepartmentID')
        ->join('jobtitle', 'employee.JobTitleID', 'jobtitle.JobTitleID')
       ->where('EmployeeID' , '=' , $EmployeeID)
        ->get();
        // dd($employee);
        // $employee = DB::select('select * from employee where EmployeeID = ?',[$EmployeeID]);    
        return view('employee.view_employ', compact('employee'));

    }

    public function EmployeeDocuments()
     {

         $employee = DB::table('employee')->where('EmployeeID',session::get('EmployeeID'))->get();
         $documents = DB::table('documents')->where('EmployeeID',session::get('EmployeeID'))->get();
       
        return view('employe_section.employeedocuments',compact('employee','documents'));

     }

     public function EmployeeDocumentsUpload(Request $request)
     {

      

                    if ($request->file('UploadFile')!=null)
                                    {
                            
                                $this->validate($request, [

                                  
                                    'FileName' => 'required',
                                    'UploadFile' => 'required|mimes:jpeg,png,jpg,gif,doc,docx,bmp,pdf|max:20000',

                                    ] );

                                $file = $request->file('UploadFile');
                                $input['filename'] = time().'.'.$file->extension();
  
                                $destinationPath = public_path('/documents');

                                $file->move($destinationPath, $input['filename']);
                            
                                $data = array ( 
                                'EmployeeID' => session::get('EmployeeID'),
                                'FileName' => $request->input('FileName'),
                                'File'=> $input['filename'],
                                // 'mimeType'=>substr($file->getMimeType(), 0, 5)
                                                );

                                }

                            
                                 $id= DB::table('documents')->insertGetId($data);
         
         
       
        
         return redirect()->back()->with('error','Document uploaded successfully')->with('class','success');
        

     }

     public function Deletedocuments($Documentid)
     {
        DB::delete('delete from documents where DocumentID = ?',[$Documentid]);
        return redirect()->back()->with('error','Document Deleted successfully')->with('class','danger');;

     }

     public function Employeeleave()
     {
        $employee = DB::table('employee')->where('EmployeeID', session::get('EmployeeID'))->get();
        $leaves = DB::table('leave')->where('EmployeeID',session::get('EmployeeID'))->get();

       return view('employe_section.employeeleave',compact('employee','leaves'));

     }
     public function EmployeeLeaveEdit($id)
{   

    $employee = DB::table('employee')->where('EmployeeID', session::get('EmployeeID'))->get();

    $leave = DB::table('leave')->where('LeaveID',$id)->get();
 
     return view ('employe_section.employeeleaveedit',compact('leave','employee')); 
}
     public function EmployeeLeaveSave(request $request)
{
    
    $EmployeeID=session::get('EmployeeID');
    $this->validate($request,[
            
             'FromDate'=>'required | date_format:d/m/Y',
             'ToDate'=>'required | date_format:d/m/Y',         
             'Reason'=>'required',         
             
              
              // 'email'=>'required | email|unique:user',
          ],
        [
          'FromDate.required' => 'Leave Start Date is required',
          'FromDate.date_format' => 'Leave start date does not match the format d/m/Y.',
          

          'ToDate.required' => 'Leave End Date is required',
          'ToDate.date_format' => 'Leave end date does not match the format d/m/Y.',
          'Reason.required' => 'Reason is required',
          
            
               
        ]);


    $data = array(
      
      'EmployeeID' => $EmployeeID, 
      'FromDate' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('FromDate')))), 
      'ToDate' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('ToDate')))),
      'Reason' => $request->Reason, 

        );


    $id= DB::table('leave')->insertGetId($data);

    return redirect()->back()->with('error','Leave Saved Successfully')->with('class','success');
    
    
    
    
}   

public function EmployeeLeaveUpdate(Request $request)
{
    $data = array('FromDate' => $request->FromDate,
                    'ToDate' => $request->ToDate,
                    'Reason' => $request->Reason );

                    $LeaveID=$request->LeaveID;
 

                    $id = DB::table('leave')->where('LeaveID', $LeaveID)->update($data);
                    return redirect('/employeeleave')->with('error','Leave Updated Successfully')->with('class','success');
}
    public function Deleteleave($Leaveid)
     {
        // DB::delete('delete from leave where LeaveID = ?',['24']);
        $id = DB::table('leave')->where('LeaveID',$Leaveid)->delete();
        return redirect()->back()->with('error','Leave Deleted successfully')->with('class','danger');;

     }

     public function Employeeloan()
     {
        $employee = DB::table('employee')->where('EmployeeID',session::get('EmployeeID'))->get();
        $loan = DB::table('loan')->where('EmployeeID',session::get('EmployeeID'))->get();
         return view('employe_section.loan',compact('employee','loan'));
     }
     public function Employeeloansave(Request $request)
     {

        $this->validate($request,[
            
            'RequestDate'=>'required | date_format:d/m/Y',
            'StartDate'=>'required | date_format:d/m/Y',      
            'Amount'=>  'required', 
            'Remarks'=>'required',         
         ],
       [
         'StartDate.required' => 'Leave Start Date is required',
         'StartDate.date_format' => 'Leave start date does not match the format d/m/Y.',
         'RequestDate.required' => 'Leave End Date is required',
         'RequestDate.date_format' => 'Leave end date does not match the format d/m/Y.',
         'Remarks.required' => 'Reason is required',
         'Amonut.required' => 'Amount is required',            
       ]);
     
       
         $EmployeeID=session::get('EmployeeID');
         $data = array('EmployeeID' => $EmployeeID,
                        'RequestDate' =>date('Y-m-d', strtotime(str_replace('/', '-', $request->input('RequestDate')))),                             
                        'Amount' => $request->Amount  ,                          
                        'Remarks' => $request->Remarks );

                        $id= DB::table('loan')->insertGetId($data);
                        return redirect()->back()->with('error','Application Submitted Successfully')->with('class','sucess');;

                       
        
     }


}
