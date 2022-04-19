<?php

namespace App\Http\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Exceptions\Handler;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    function login()
    {
        return view('auth.login');
    }


    function logout()
    {
        Session::flush(); // removes all session data
        return redirect('/login')->with('error', 'Logout Successfully.');
    }

    public function UserVerify(request $request)
    {
        
        if ($request->StaffType == 'Management') {

             $username = $request->input('email');
            $password =  $request->input('password');
            

            $data = DB::table('employee')->where('Email', '=', $username)
                ->where('Password', '=', $password)
                ->where('Active', '=', 'Y')
                ->get();
                // dd($data);
            if (count($data) > 0) {
                Session::put('FullName', $data[0]->FirstName);
                Session::put('UserID', $data[0]->EmployeeID);
                Session::put('Email', $data[0]->Email);
                Session::put('StaffType', $data[0]->StaffType);
                Session::put('DepartmentID', $data[0]->DepartmentID);
                Session::put('LoggedUser');


                if (session::get('StaffType') == 'HR') {
                    return redirect('employee')->with('error', 'Welcome to Extensive HR System')->with('class', 'success');
                } elseif (session::get('StaffType') == 'GM') {
                    return redirect('showemployee')->with('error', 'Welcome to Extensive HR System')->with('class', 'success');
                } elseif (session::get('StaffType') == 'OM') {

                    return redirect('admin_dashboard')->with('error', 'Welcome to Extensive HR System')->with('class', 'success');
                    // return redirect('showemployee')->with('error','Welcome to Extensive HR System')->with('class','success');

                }
            } else {


                //session::flash('error', 'Invalid username or Password. Try again'); 

                return redirect('/login')->with('error', 'Invalid User Name or Password')->with('class', 'success');

                // return redirect ('Login')->withinput($request->all())->with('error', 'Invalid username or Password. Try again');
            }
        } else {

            $username = $request->input('email');
            $password =  $request->input('password');
            $staff_type = $request->StaffType;

            $data = DB::table('employee')->where('Email', '=', $username)
                ->where('Password', '=', $password)
                ->where('StaffType', '=', $staff_type)
                // ->where('Active', '=', 'Y' )
                ->get();
            // dd($data);
            if (count($data) > 0) {
                Session::put('FullName', $data[0]->FirstName . '' . $data[0]->MiddleName . '' . $data[0]->LastName);
                Session::put('EmployeeID', $data[0]->EmployeeID);
                Session::put('Email', $data[0]->Email);
                Session::put('StaffType', $data[0]->StaffType);
                Session::put('BranchID', $data[0]->DepartmentID);
                Session::put('LoggedUser');
                return redirect('employ_dashboard');
            } else {
                return redirect('/login')->withinput($request->all())->with('error', 'Invalid username or Password. Try again');
            }
        }
    }

}
