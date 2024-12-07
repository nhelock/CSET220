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
    
    function PatientsHome(){
        return view('patients_home', array('date' => date("Y-m-d")));
    // yyyy-mm-dd
        $data = DB::table('itineraries')
        ->join('users', 'users.user_id', '=', 'itineraries.user_id')
        ->select('CONCAT(users.firstName, users.lastName) as caregivers name', 'itineraries.morningMed', 'itineraries.afternoonMed', 'itineraries.nightMed', 'itineraries.lunch', 'itineraries.dinner')
        ->get();
    }
    
    function Payment(){
        return view('payment');
    }
};


//SELECT users.userID, users.roleID, users.firstName, users.lastName, itineraries.userID, itineraries.morningMed, itineraries.afternoonMed, itineraries.nightMed, itineraries.lunch, itineraries.dinner FROM users INNER JOIN itineraries ON users.userID=itineraries.userID;