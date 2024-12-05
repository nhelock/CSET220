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
       
        $patients = users::join('prescriptions', 'users.userID', '=', 'prescriptions.userID')
            ->select(
                'users.firstName as first_name',
                'users.lastName as last_name',
                'prescriptions.date',
                'prescriptions.comment',
                'prescriptions.morningMed',
                'prescriptions.afternoonMed',
                'prescriptions.nightMed'
                
            )
            ->get();

        return view('DoctorH.index', compact('patients'));
    }

    //Search by name input box
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:50',
        ]);

        $searchName = $request->input('search');

        $patients = users::join('prescriptions', 'users.userID', '=', 'prescriptions.userID')
        ->where('users.lastName', 'LIKE', '%' .$searchName . '%')
            ->select(
                'users.firstName as first_name',
                'users.lastName as last_name',
                'prescriptions.date',
                'prescriptions.comment',
                'prescriptions.morningMed',
                'prescriptions.afternoonMed',
                'prescriptions.nightMed'
                
            )
            ->get();

            if (count($patients) === 0) {
                return view('DoctorH.index', [
                    'patients' => $patients,
                    'search' => $searchName,
                    'error' => 'No patients found'
                ]);
            }
                

        return view('DoctorH.index', compact('patients'));
    }

    //Search for appointmetns til a certain date input box function
    public function searchTilDate(Request $request)
    {
        $request->validate([
            'til_date' => 'required|date'
        ]);

        $tilDate = $request->input('til_date');

        $patients = users::join('prescriptions', 'users.userID', '=', 'prescriptions.userID')
        ->where('prescriptions.date', '<=', $tilDate)
            ->select(
                'users.firstName as first_name',
                'users.lastName as last_name',
                'prescriptions.date',
                'prescriptions.comment',
                'prescriptions.morningMed',
                'prescriptions.afternoonMed',
                'prescriptions.nightMed'
                
            )
            ->orderBy('prescriptions.date', 'asc')
            ->get();

        return view('DoctorH.index', compact('patients', 'tilDate'));
    }
    

}
