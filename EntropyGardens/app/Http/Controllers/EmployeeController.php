<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\salaries;
use App\Models\family_information;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = users::join('salaries', 'users.userID', '=', 'salaries.userID')
            ->join('roles', 'users.roleID', '=', 'roles.roleID')
            ->select(
                'users.roleID as id',
                'users.firstName as first_name',
                'users.lastName as last_name',
                'roles.roleName as role',
                'salaries.salary'
            )
            ->get();

        return view('employee.index', compact('employees'));
    }

    public function searchJoin(Request $request)
    {
        $employees = users::join('salaries', 'users.userID', '=', 'salaries.userID')
        ->join('roles', 'users.roleID', '=', 'roles.roleID')
        ->select(
            'users.roleID as id',
            'users.firstName as first_name',
            'users.lastName as last_name',
            'roles.roleName as role',
            'salaries.salary'
        )
        ->get();
        if($request['search_by'] == 'salary'){
            $foundUsers = users::join('salaries', 'users.userID', '=', 'salaries.userID')
            ->join('roles', 'users.roleID', '=', 'roles.roleID')
            ->select(
                'users.userID as id',
                'users.firstName as first_name',
                'users.lastName as last_name',
                'roles.roleName as role',
                'salaries.salary'
            )
            ->where('salaries.' . $request['search_by'], $request['search'])
            ->get();
        }
        else{
            $foundUsers = users::join('salaries', 'users.userID', '=', 'salaries.userID')
            ->join('roles', 'users.roleID', '=', 'roles.roleID')
            ->select(
                'users.userID as id',
                'users.firstName as first_name',
                'users.lastName as last_name',
                'roles.roleName as role',
                'salaries.salary'
            )
            ->where('roles.' . $request['search_by'], $request['search'])
            ->get();
        }

        // return $employee;
        return view('employee.index', ['employees' => $employees, 'foundUsers' => $foundUsers]);
    }

    public function search(Request $request)
    {
        $employees = users::join('salaries', 'users.userID', '=', 'salaries.userID')
        ->join('roles', 'users.roleID', '=', 'roles.roleID')
        ->select(
            'users.roleID as id',
            'users.firstName as first_name',
            'users.lastName as last_name',
            'roles.roleName as role',
            'salaries.salary'
        )
        ->get();

        $foundUsers = users::join('salaries', 'users.userID', '=', 'salaries.userID')
            ->join('roles', 'users.roleID', '=', 'roles.roleID')
            ->select(
                'users.userID as id',
                'users.firstName as first_name',
                'users.lastName as last_name',
                'roles.roleName as role',
                'salaries.salary'
            )
            ->where('users.' . $request['search_by'], $request['search'])
            ->get();


        // return $employee;
        return view('employee.index', ['employees' => $employees, 'foundUsers' => $foundUsers]);
    }

    public function updateSalary(Request $request)
    {
        //ADD IF STATEMENT HERE TO CHECK IF THE SESSION ACCESS LEVEL IS = TO ADMIN
        if(session('accesslevel') == 1){
            $data = $request->all();
            $employee = salaries::where('userID', $data['employee_id'])->first();

            $employee->update(['salary' => $data['new_salary']]);

            return redirect('/employees');
        }
        return redirect('/employees');
        
    }

    public function viewPatients()
    {
       
        $patients = users::join('family__information', 'users.userID', '=', 'family__information.userID')
                    ->join('groups', 'users.userID', '=', 'groups.userID')
                    ->where('users.roleID', 5)
                    ->select(
                        'users.userID as ID',
                        'users.firstName as first_name',
                        'users.lastName as last_name',
                        'users.DOB as DOB',
                        'family__information.relation as relation',
                        'family__information.emergencyContact as EmergencyContactNumber',
                        'groups.admissionDate as AdmissionDate')
            ->get();
        return view('PatientsList', compact('patients'));

    }

    public function searchPatByID(Request $request)
    {
        $request->validate([
            'search' => 'required|numeric',
        ]);
    
        $searchID = $request->input('search');

        $patients = users::join('groups', 'users.userID', '=', 'groups.userID')
                    ->join('family__information', 'users.userID', '=', 'family__information.userID')
                    ->where('users.userID', $searchID)
                    ->select(
                        'users.userID as ID',
                        'users.firstName as first_name',
                        'users.lastName as last_name',
                        'users.DOB as DOB',
                        'family__information.relation as relation',
                        'family__information.emergencyContact as EmergencyContactNumber',
                        'groups.admissionDate as AdmissionDate')
            ->get();
        return view('PatientsList', compact('patients'));
    }

    public function searchPatByLastName(Request $request)
    {
        $request->validate([
            'lastName' => 'required|string|max:50'
        ]);

        $searchID = $request->input('lastName');

        $patients = users::join('appointments', 'users.userID', '=' , 'appointments.userID_Patient')
                    ->join('family__information', 'users.userID', '=', 'family__information.userID')
                    ->join('groups', 'users.userID', '=', 'groups.userID')
                    
                    ->where('users.lastName', $searchID)
                    ->select(
                        'users.userID as ID',
                        'users.firstName as first_name',
                        'users.lastName as last_name',
                        'users.DOB as DOB',
                        'family__information.relation as relation',
                        'family__information.emergencyContact as EmergencyContactNumber',
                        'groups.admissionDate as AdmissionDate')
            ->get();
        return view('PatientsList', compact('patients'));
    }

    // public function searchPatByCon(Request $request)
    // {
    //     $request->validate([
    //         'eContact' => 'required|string|max:50'
    //     ]);

    //     $searchID = $request->input('eContact');

    //     $patients = users::join('appointments', 'users.userID', '=' , 'appointments.userID_Patient')
    //                 ->join('family__information', 'users.userID', '=', 'family__information.userID')
    //                 ->join('groups', 'users.userID', '=', 'groups.userID')
    //                 ->where('users.roleID', 5)
    //                 ->where('family__information.emergencyContact', $searchID)
    //                 ->select(
    //                     'users.userID as ID',
    //                     'users.firstName as first_name',
    //                     'users.lastName as last_name',
    //                     'users.DOB as DOB',
    //                     'family__information.relation as relation',
    //                     'family__information.emergencyContact as EmergencyContactNumber',
    //                     'groups.admissionDate as AdmissionDate')
    //         ->get();
    //     return view('PatientsList', compact('patients'));
    // }

    public function searchPatByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $searchID = $request->input('date');

        $patients = users::join('appointments', 'users.userID', '=' , 'appointments.userID_Patient')
                    ->join('family__information', 'users.userID', '=', 'family__information.userID')
                    ->join('groups', 'users.userID', '=', 'groups.userID')
                    
                    ->where('group.admissionDate', $searchID)
                    ->select(
                        'users.userID as ID',
                        'users.firstName as first_name',
                        'users.lastName as last_name',
                        'users.DOB as DOB',
                        'family__information.relation as relation',
                        'family__information.emergencyContact as EmergencyContactNumber',
                        'groups.admissionDate as AdmissionDate')
            ->get();
        return view('PatientsList', compact('patients'));
    }
}


