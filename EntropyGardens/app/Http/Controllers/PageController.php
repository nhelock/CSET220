<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\roles;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function Roles(){
        return view('role')->with([
            "roles" => roles::all()
        ]);
    }
    
    function Login(){
        return view('login');
    }
    
    function PatientofDoctor(){
        return view('patient_of_doctor');
    }
    
    function PatientsHome() {
        $date = date("Y-m-d");
    
        $users = DB::table('users')
            ->join('roles', 'roles.roleID', '=', 'users.roleID')
            ->select('users.userID', 'users.firstName', 'users.lastName')
            ->get();
    
        $patients = DB::table('appointments')
            ->join('users', 'users.userID', '=', 'appointments.userID_Patient')
            ->where('users.roleID', '=',7)
            ->or('users.roleID', '=',5)
            ->select('users.userID', 'appointments.userID_Patient')
            ->get();
    
        $itineraries = DB::table('itineraries')
            ->join('users', 'users.userID', '=', 'itineraries.userID')
            ->select('users.firstName', 'users.lastName', 'itineraries.morningMed', 'itineraries.afternoonMed', 'itineraries.nightMed', 'itineraries.breakfast', 'itineraries.lunch', 'itineraries.dinner')
            ->get();
    
        return view('patients_home', [
            'date' => $date,
            'patients' => $patients->userID_Patient,
            'users' => $users,
            'itineraries' => $itineraries->firstName,
            'itineraries' => $itineraries->lastName
        ]);
    }

    function PatientsHome2(){
        return view('patients_home2');
    }
    
    function Payment(){
        return view('payment');
    }
}
