<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\users;
use App\Models\itineraries;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CaregiverHomeControlller extends Controller{   

    public function view(){

        // $today = Carbon::today();
        
        $patients = users::join('itineraries', 'users.userID', '=', 'itineraries.userID')
            ->whereRaw('DATE(itineraries.date) = CURDATE()')
            ->select(
                'users.firstName as first_name',
                'users.lastName as last_name',
                'itineraries.date',
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
    
    
    
    public function submitChecklist(Request $request){
        
        $data = $request->input('patients', []);

        foreach ($data as $patientID => $items) {
        
            $updateData = [
                'morningMed' => isset($items['morningMed']) ? 1 : 0,
                'afternoonMed' => isset($items['afternoonMed']) ? 1 : 0,
                'nightMed' => isset($items['nightMed']) ? 1 : 0,
                'breakfast' => isset($items['breakfast']) ? 1 : 0,
                'lunch' => isset($items['lunch']) ? 1 : 0,
                'dinner' => isset($items['dinner']) ? 1 : 0,
            ];

            
            itineraries::where('userID', $patientID)->update($updateData);
        }
            
        return redirect()->back()->with('success', 'Checklist updated successfully!');
    }

}

// public function checklistTest(Request $request){
    //     if($request->morningMed == 'on'){
    //         $morningMed = true;
    //     }

    //     $data = [
    //         'morningMed' => $morningMed
    //     ]
    //     return $request->all();
    // }