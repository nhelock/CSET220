<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\salaries;

class EmployeeController extends Controller
{
    public function index()
    {
       
        $employees = users::join('salaries', 'users.roleID', '=', 'salaries.userID')
            ->select(
                'users.roleID as id',
                'users.firstName as first_name',
                'users.lastName as last_name',
                'users.roleID as role',
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
        
    }
}
