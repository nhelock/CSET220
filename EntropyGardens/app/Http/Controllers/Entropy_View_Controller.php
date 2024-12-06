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

    //Start of Patient Functions
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

}
