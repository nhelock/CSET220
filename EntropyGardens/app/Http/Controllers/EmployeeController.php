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

    public function search(Request $request)
    {
        
    }

    public function updateSalary(Request $request)
    {
        $data = $request->all();
        $employee = salaries::where('userID', $data['employee_id'])->first();

        $employee->update(['salary' => $data['new_salary']]);

        return redirect('/employees');
    }
}
