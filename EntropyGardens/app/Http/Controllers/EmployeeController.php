<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\salaries;

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
}
