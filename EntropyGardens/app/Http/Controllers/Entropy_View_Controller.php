<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\users;
use App\Models\outstanding_balances;
use App\Models\family_Information;
use App\Models\itineraries;
use App\Models\groups;
use App\Models\rosters;
use App\Models\appointments;
use App\Models\prescriptions;
use Carbon\Carbon;


class Entropy_View_Controller extends Controller
{
    public function displayHome(){
        return view('homepage');
    }

    public function test(){
        $test = "Hello World";
        return $test;
    }
    public function register(){
        $inputs = roles::all();
        return view('register', ['inputs' => $inputs]);
    }



    public function registrationApproval(){
        if(session('accesslevel') == 1){
            $users = users::join('roles', 'roles.roleID', '=', 'users.roleID')->get();
            return view('registrationApproval', ['users' => $users]);
        }
        return redirect('/');
    }

    public function loginPage(){
        return view('login');
    }

    public function newRoster(){
        return view('newRoster');
    }
    
    public function additionalInfo(){
        return view('additional');
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }

    public function roster_list(){
        if(session('data')){
            
            $data = session('data');
            return view('rosters_list', ['data' => $data]);
        }
        $data = session('data');
        return view('rosters_list', ['data' => $data]);

    }

    public function roster_show(Request $request){
        $controller = new Entropy_API_Controller();

        $data = $controller->roster($request);
        return $data;
    }
    // Put the rest for the Family Home Page here





    //This is the start of the payment system.
    //I'm still mad I'm doing this when I helped someone through the entire thing and that wasn't good enough apparently?
    public function payment(){
        $patients = outstanding_balances::join('users', 'users.userID', '=', 'outstanding_balances.userID')->get();

        foreach ($patients as $patient) {

            $lastUpdated = \Carbon\Carbon::parse($patient->last_updated);
            $today = \Carbon\Carbon::today();
            $today_fix = $today->toDateString();

            if ($lastUpdated->lt($today)){
                $daysDifference = $lastUpdated->diffInDays($today);


                outstanding_balances::where('userID', $patient->userID)
                    ->increment('payTab', 10 * $daysDifference);


                outstanding_balances::where('userID', $patient->userID)
                    ->update(['last_updated' => $today_fix]);
            }
        }

        $patients = outstanding_balances::join('users', 'users.userID', '=', 'outstanding_balances.userID')->get();
        return view('payment', ['patients' => $patients]);
    }

    public function roles(){
        $roles = roles::all();

        return view('roles', ['roles' => $roles]);
    }

    //Start of Family of Patient Functions
    public function familyHome(){
        return view('familyHome');
    }

    public function familyPatientSearch(Request $request){
        $data = family_information::where('userID', '=', $request->userID)
        ->where('familyCode', '=', $request->familyCode)->first();

        if($data){
            return view('familyHome', ['code_form' => $data['userID']]);
        }
        return redirect('/family');
    }

    public function familyRosterSearch(Request $request){
        $data = itineraries::where('userID', '=', $request->userID)->where('date', '=', $request->date)->first();
        
        if($data){
            $group = groups::where('userID', '=', $data['userID'])->first();

            $groupName = $group['groupName'];
            $roster = rosters::where('date', '=', $data['date'])->first();


            $doctor = users::where('userID', '=', $roster['userID_Doctor'])->select('firstName', 'lastName')->first();
            if($group == 'Alpha'){
                $caregiver = users::where('userID', '=', $roster['userID_CG1'])->select('firstName', 'lastName')->first();
            }
            elseif($group == 'Bravo'){
                $caregiver = users::where('userID', '=', $roster['userID_CG2'])->select('firstName', 'lastName')->first();
            }
            elseif($group == 'Charlie'){
                $caregiver = users::where('userID', '=', $roster['userID_CG3'])->select('firstName', 'lastName')->first();
            }
            else{
                $caregiver = users::where('userID', '=', $roster['userID_CG4'])->select('firstName', 'lastName')->first();
            }
            
            $appointment = appointments::where('userID_Patient', '=', $data['userID'])->where('date', '=', $data['date'])->first();
            if($appointment){
                $is_appointment = 'Yes';
            }
            else{
                $is_appointment = 'No';
            }
            $new_data = [
                'doctorName' => $doctor['firstName'] .  " " . $doctor['lastName'],
                'doctorAppointment' => $is_appointment,
                'caregiverName' => $caregiver['firstName'] . " " . $caregiver['lastName'],
                'morningMedicine' => $data['morningMed'],
                'afternoonMedicine' => $data['afternoonMed'],
                'nightMedicine' => $data['nightMed'],
                'breakfast' => $data['breakfast'],
                'lunch' => $data['lunch'],
                'dinner' => $data['dinner']
            ];
            // return $new_data;
            return view('familyHome', ['code_form' => $group['userID'], 'data' => $new_data]);
        }
        return view('familyHome', ['code_form' => $request->userID]);
    }

    //Functions for Patient's Home Page
    public function patientHome(Request $request){

        if(session('roleName') == 'patient'){
            $userID = session('userID');
            $name = session('firstName') . " " . session('lastName');

            if($request->date){
                $date = $request->date;
            }
            else{
                $today = \Carbon\Carbon::today();
                $today_fix = $today->toDateString();
                $date = $today_fix;
            }
            $data = itineraries::where('userID', '=', session('userID'))->where('date', '=', $date)->first();

            if($data){
                $group = groups::where('userID', '=', $data['userID'])->first();

                $groupName = $group['groupName'];
                $roster = rosters::where('date', '=', $data['date'])->first();


                $doctor = users::where('userID', '=', $roster['userID_Doctor'])->select('firstName', 'lastName')->first();

                if($group == 'Alpha'){
                    $caregiver = users::where('userID', '=', $roster['userID_CG1'])->select('firstName', 'lastName')->first();
                }
                elseif($group == 'Bravo'){
                    $caregiver = users::where('userID', '=', $roster['userID_CG2'])->select('firstName', 'lastName')->first();
                }
                elseif($group == 'Charlie'){
                    $caregiver = users::where('userID', '=', $roster['userID_CG3'])->select('firstName', 'lastName')->first();
                }
                else{
                    $caregiver = users::where('userID', '=', $roster['userID_CG4'])->select('firstName', 'lastName')->first();
                }
                
                $appointment = appointments::where('userID_Patient', '=', $data['userID'])->where('date', '=', $data['date'])->first();
                if($appointment){
                    $is_appointment = 'Yes';
                }
                else{
                    $is_appointment = 'No';
                }
                $new_data = [
                    'doctorName' => $doctor['firstName'] .  " " . $doctor['lastName'],
                    'doctorAppointment' => $is_appointment,
                    'caregiverName' => $caregiver['firstName'] . " " . $caregiver['lastName'],
                    'morningMedicine' => $data['morningMed'],
                    'afternoonMedicine' => $data['afternoonMed'],
                    'nightMedicine' => $data['nightMed'],
                    'breakfast' => $data['breakfast'],
                    'lunch' => $data['lunch'],
                    'dinner' => $data['dinner']
                ];
                // return $new_data;
                return view('patientH', ['userID' => $userID, 'name' => $name, 'date' => $date, 'data' => $new_data]);
            }
            return view('patientH', ['userID' => $userID, 'name' => $name, 'date' => $date,]);
        }
        
    }



    //Function for Additional Information of Patient
    public function additionalSearchID(Request $request){
        $controller = new Entropy_API_Controller();

        $data = $controller->patientInfo($request);

        return $data;

        return view('additional', ['patientFound' => $data]);
    }


    //Functions for Patient of Doctor Page:
    public function doctorPatients(){
        return view('patientOfDoctor');
    }

    public function doctorPatientSearch(Request $request){
        $userID = $request->userID;
        $today = \Carbon\Carbon::today();
        $today_fix = $today->toDateString();
        $date = $today_fix;

        $user = users::where('userID', '=', $userID)->first();


        $prescription = prescriptions::where('userID', '=', $userID)->first();
        $appointment = appointments::where('userID_Patient', '=', $userID)->where('date', '=', $date)->first();

        if(!$user){
            return redirect('/doctor/patients');
        }
        if(!$prescription && !$appointment){
            return redirect('/doctor/patients');
        }

        //On the Page, do logic for if the prescription and appointment are there.

        return view('patientOfDoctor', ['prescription' => $prescription, 'appointment' => $appointment,
        'data' => true, 'userID' => $userID]);
        
    }

    public function appointments(Request $request){

        if($request->date && $request->userID_Patient){
            $data = $request->all();

            $doctorID_Value = rosters::where('date', '=', $data['date'])->select('userID_Doctor')->first();

            $doctor_data = users::where('userID', '=', $doctorID_Value['userID_Doctor'])->first();

            $doctorName = $doctor_data['firstName'] . " " . $doctor_data['lastName'];

            $doctorID = $doctorID_Value['userID_Doctor'];


            $patient_data = users::where('userID', '=', $data['userID_Patient'])->first();

            $patientName = $patient_data['firstName'] . " " . $patient_data['lastName'];

            return view('appointments', ['data' => $data, 'patientName' => $patientName, 'doctorName' => $doctorName, 'doctorID' => $doctorID]);
        }
        return view('appointments');
    }

    public function adminReport(Request $request){
        if($request->date){
            $data = itineraries::join('users', 'itineraries.userID', '=', 'users.userID')
            ->where('date', $request->date)
            ->where(function ($query) {
                $query->where('morningMed', false)
                      ->orWhere('afternoonMed', false)
                      ->orWhere('nightMed', false)
                      ->orWhere('breakfast', false)
                      ->orWhere('lunch', false)
                      ->orWhere('dinner', false);
            })
            ->get();

            $data->each(function ($item){
                $doctorID = rosters::where('date', '=', $item->date)->first();
                $doctorNameValue = users::where('userID', '=', $doctorID['userID_Doctor'])->first();
                $doctorName = $doctorNameValue['firstName'] . " " . $doctorNameValue['lastName'];
                $item->doctorName = $doctorName;
            });
            $data->each(function ($item){
                $patientGroup = groups::where('userID', '=', $item->userID)->first();
                $roster = rosters::where('date', '=', $item->date)->first();
                if($patientGroup['groupName'] == 'Alpha'){
                    $caregiver = $roster['userID_CG1'];
                }
                elseif($patientGroup['groupName'] == 'Bravo'){
                    $caregiver = $roster['userID_CG2'];
                }
                elseif($patientGroup['groupName'] == 'Charlie'){
                    $caregiver = $roster['userID_CG3'];
                }
                else{
                    $caregiver = $roster['userID_CG4'];
                }
                $caregiverNameValue = users::where('userID', '=', $caregiver)->first();
                $caregiverName = $caregiverNameValue['firstName'] . " " . $caregiverNameValue['lastName'];
                $item->caregiverName = $caregiverName;
            });
            $data->each(function ($item){
                $appointment = appointments::where('date', '=', $item->date)->where('userID_Patient', '=', $item->userID)->first();

                if($appointment){
                    $item->appointment = "Yes";
                }
                else{
                    $item->appointment = "No";
                }
            });

            // return $data;
            return view('adminreport', ['entries' => $data]);
        
        }

        return view('adminreport');
    }

}
