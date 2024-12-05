<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\users;
use App\Models\itineraries;
use Illuminate\Http\Request;

class CaregiverHomeControlller extends Controller
{
    public function index()
    {
       
        $patients = users::join('itineraries', 'users.userID', '=', 'itineraries.userID')
            ->select(
                'users.firstName as first_name',
                'users.lastName as last_name',
                'itineraries.morningMed',
                'itineraries.afternoonMed',
                'itineraries.nightMed',
                'itineraries.breakfast',
                'itineraries.lunch',
                'itineraries.dinner'
                
            )
            ->get();

        return view('CaregiverH', compact('patients'));
    }
}
