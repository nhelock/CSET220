<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\prescriptions;

class DoctorHomeController extends Controller
{
    public function index()
    {
       
        $patients = users::join('prescriptions', 'users.roleID', '=', 'prescriptions.userID')
            ->select(
                'users.firstName as first_name',
                'prescriptions.date',
                'prescriptions.morningMed',
                'prescriptions.afternoonMed',
                'prescriptions.nightMed',
                
            )
            ->get();

        return view('DoctorH.index', compact('patients'));
    }
}
