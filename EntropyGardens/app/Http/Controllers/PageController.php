<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function Roles(){
        return view('role');
    }
    
    function Login(){
        return view('login');
    }
    
    function PatientofDoctor(){
        return view('patient_of_doctor');
    }
    
    function PatientsHome(){
        return view('patients_home');
    }
    
    function Payment(){
        return view('payment');
    }
};
