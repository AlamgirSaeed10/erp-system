<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class WorkController extends Controller
{
    function job()
    {
        $jobtitles = DB::table('jobtitle')->get();
        // dd($jobtitles);
        return view('employee/job_title', ['jobtitles'=>$jobtitles]);
    } 

    function add_job(Request $request)
    {
        $this->validate($request, [
            'JobTitleName' => 'required|max:30',
        ]);

        $JobTitleName=$request->JobTitleName;
        DB::table('jobtitle')->insert([
            'JobTitleName' => $JobTitleName
        ]);
        return redirect()->back();
    }

    public function destroy_job($JobTitleID) 
    {
        DB::delete('delete from jobtitle where JobTitleID = ?',[$JobTitleID]);
        return redirect()->back();
    }

    function edit_job($JobTitleID)
    {
        $jobtitles = DB::select('select * from jobtitle where JobTitleID = ?',[$JobTitleID]);
        //  dd($jobtitles);
        return view('employee/edit_job',['jobtitles'=> $jobtitles]);
    }

    public function update_job(Request $request,$JobTitleID)
    {
        $JobTitleName = $request->input('JobTitleName');
        DB::update('update jobtitle set JobTitleName = ? where JobTitleID = ?',[$JobTitleName,$JobTitleID]);
        return redirect('Job_Title');
    }


    //  dfdsfdsf
    function view_job($JobTitleID)
    {
        $viewjobs= DB::get('Select * from jobtitle where JobTitleID = $JobTitleID');
        dd($viewjobs);
        return view('employee/view_job', compact('viewjobs'));
    } 

     function leave_status()
    {
        $leave_statuses = DB::table('leave_status')
        ->get();
        // dd($leave_statuses);
        return view('employee/leave_status', compact('leave_statuses'));
    }

    function add_leave_status(Request $request)
    {
        $this->validate($request, [
            'LeaveStatus' => 'required|max:30',
        ]);

        $Leavestatus=$request->LeaveStatus;
        DB::table('leave_status')->insert([
            'LeaveStatus' => $Leavestatus
        ]);
        return redirect()->back();
    }

    public function destroy_leave_status($LeaveStatusID) 
    {
        DB::delete('delete from leave_status where LeaveStatusID = ?',[$LeaveStatusID]);
        return redirect()->back();
    }

    function edit_leave_status($LeaveStatusID)
    {
        $leave_status = DB::select('select * from `leave_status` where LeaveStatusID = ?',[$LeaveStatusID]);
        //  dd($jobtitles);
        return view('employee/edit_leave_status',['leave_status'=> $leave_status]);
    }

    public function update_leave_status(Request $request,$LeaveStatusID)
    {
        // dd($request);
        $LeaveStatus = $request->input('LeaveStatus');
        DB::update('update `leave_status` set LeaveStatus= ? where LeaveStatusID = ?',[$LeaveStatus,$LeaveStatusID]);
        // return redirect()->back();
        return redirect('Leave_Status');
    }

    function leave()
    {
        $leaves = DB::table('leave')->get();
        $employees  =  DB::table('employee')->select('employee.EmployeeID', 'employee.FirstName')->get();
        // dd($employees);
        return view('employee/leave', compact('leaves','employees'));
    } 

    public function add_leave(Request $request)
    {
        $this->validate($request, [
                    'EmployeeID' => 'required|max:30',
                    'FromDate' => 'required|max:30',
                    'ToDate' => 'required|max:30',
                    'Reason' => 'required|max:30',
                ]);


        $EmployeeID = $request->input('EmployeeID');
        $FromDate = $request->input('FromDate');
        $ToDate = $request->input('ToDate');
        $Reason = $request->input('Reason');

        $data=array('EmployeeID'=>$EmployeeID,
        "FromDate"=>$FromDate,
        "ToDate"=>$ToDate,
        "Reason"=>$Reason);

        DB::table('leave')->insert($data);
        return redirect()->back();
    }

    public function destroy_leave($LeaveID)
     {
        // dd($LeaveID);
        DB::delete('delete from `leave` where LeaveID = ?',[$LeaveID]);
        

        return redirect()->back();
    }

    function edit_leave($LeaveID)
    {
        $employees  =  DB::table('employee')->select('employee.EmployeeID', 'employee.FirstName')->get();
        $leaves = DB::select('select * from `leave` where LeaveID = ?',[$LeaveID]);
        //  dd($jobtitles);
        return view('employee/edit_leave',['leaves'=> $leaves,'employees'=>$employees]);
    }

    public function update_leave(Request $request,$LeaveID)
    {
        $EmployeeID = $request->input('EmployeeID');
        $FromDate = $request->input('FromDate');
        $ToDate = $request->input('ToDate');
        $Reason = $request->input('Reason');
        DB::update('update `leave` set EmployeeID= ?,FromDate= ?,ToDate= ?,Reason = ? where LeaveID = ?',[$EmployeeID,$FromDate,$ToDate,$Reason,$LeaveID]);
        return redirect('leave')->with('primary',' Updates Successfully')->with('class','primary');
    }

    function view_letter()
    {
        $letters = DB::table('letter')->get();
        // dd($letters);
        return view('employee/letter', compact('letters'));
    }

    function add_letter(Request $request)
    {
        $this->validate($request, [
            'Title' => 'required|max:30',
            'Content' => 'required|max:30',
            'UserID' => 'required|max:30',
        ]);


        $Title = $request->input('Title');
        $Content = $request->input('Content');
        $UserID = $request->input('UserID');

        $data=array(
        'Title'=>$Title,
        "Content"=>$Content,
        "UserID"=>$UserID,
        );

        DB::table('letter')->insert($data);
        return redirect()->route('letter');

    }

    function addletter()
    {
        return view('employee/addletter');
    }

    public function destroy_letter($LetterID) 
    {
        DB::delete('delete from letter where LetterID = ?',[$LetterID]);
        return redirect('letter')->with('error',' Deleted Successfully')->with('class','danger');
    }

    function edit_letter($LetterID)
    {
        $letters = DB::select('select * from `letter` where LetterID  = ?',[$LetterID ]);
        //  dd($jobtitles);
        return view('employee/edit_letter',['letters'=> $letters]);
    }

    public function update_letter(Request $request,$LetterID)
    {
        $Title = $request->input('Title');
        $Content = $request->input('Content');
        DB::update('update `letter` set Title= ?,Content= ? where LetterID = ?',[$Title,$Content,$LetterID]);
        return redirect('letter')->with('primary',' Updates Successfully')->with('class','primary');
    }

    function report()
    {
        $reports = DB::table('report')->get();
        $employees  =  DB::table('employee')->select('employee.EmployeeID', 'employee.FirstName')->get();
        // dd($employees);
        return view('employe_section/report',compact('reports','employees'));
    }

    function add_report(Request $request)
    {
        $this->validate($request, [
            'Title' => 'required|max:30',
            'TextArea' => 'required|max:30',

        ]);


        $Title = $request->input('Title');
        $TextArea = $request->input('TextArea');
        $EmployeeID = $request->input('user_id');

        if ($request->hasFile('ReportFile')) {
            $file = $request->file('ReportFile');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/employee_report';
            $storage = $file->move($destinationPath, $fileName);
        } else {
            $fileName = Null;
        }


        $data=array(
        'Title'=>$Title,
        "TextArea"=>$TextArea,
        "EmployeeID"=>$EmployeeID,
        "ReportFile"=>$fileName
        );


        DB::table('report')->insert($data);
        return redirect()->route('Report');

    }

    function edit_report($ReportID)
    {
        $reports = DB::select('select * from report where ReportID   = ?',[$ReportID  ]);
        //  dd($jobtitles);
        return view('employe_section/edit_report',['reports'=> $reports]);
    }
public function update_report(Request $request,$ReportID )
    {
        $Title = $request->input('Title');
        $TextArea = $request->input('TextArea');
        if ($request->hasFile('ReportFile')) {
            $file = $request->file('ReportFile');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/employee_report';
            $storage = $file->move($destinationPath, $fileName);
        } else {
            $fileName =  $request->input('OldFile');;
        }

        DB::update('update report set Title= ?, TextArea= ?, ReportFile = ?  where ReportID = ?',[$Title,$TextArea,$fileName,$ReportID]);
        return redirect('Report')->with('primary',' Updates Successfully')->with('class','primary');
    }

    public function destroy_report($ReportID) 
    {
        DB::delete('delete from report where ReportID = ?',[$ReportID]);
        return redirect('Report')->with('error',' Deleted Successfully')->with('class','danger');
    }

    
}
