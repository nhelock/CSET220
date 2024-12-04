<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\family_information;
use App\Models\roles;
use App\Models\rosters;
use Illuminate\Http\Request;



class Entropy_API_Controller extends Controller
{
    public $timestamps=false;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(Request $request){
        $confirm = $request->confirm;
        $userID = $request->userID;
        $role = $request->role;

        if($confirm == 'true'){
            if($role == 'patient'){
                family_information::where('userID', $userID)->update(['isRegistered' => true]);
            }

            users::where('userID', $userID)->update(['isRegistered' => true]);
        }
        elseif($confirm == 'false'){
            if($role == 'patient'){
                family_information::where('userID', $userID)->delete();
            }
            users::where('userID', $userID)->delete();
        }
        return redirect('/approval');
    }

    public function register(Request $request){
        // $data = $request->all();

        $data = ['roleID'=>$request->input('roleID'), 'firstName'=>$request->input('firstName'), 'lastName'=>$request->input('lastName'), 'email'=>$request->input('email'), 
            'phoneNumber'=>$request->input('phoneNumber'), 'password'=>$request->input('password'), 'DOB'=>$request->input('DOB')];
      
        $insert_email = $request->email;


        $compare = users::where('email', '=', $insert_email)->first();


        if(isset($compare)){
            $inputs = roles::all();
            return view('/register', ['data' => true, 'inputs' => $inputs]);

        }
        //THIS IS NOT CURRENTLY WORKING, REMEMBER TO FIX THIS IN THE MORNING
        //Fixed it :uwucat:
        if($request->input('roleID') == 5){
            users::create($data);
            // $finder = users::where('userID', '=', 1)->first();
            $finder = users::where('email', '=', $request->input('email'))->first();
            $patient_ID = $finder->userID;
            $patient_Data = ['userID'=>$patient_ID, 'familyCode'=>$request->input('familyCode'),
                'emergencyContact'=>$request->input('emergencyContact'), 'relation'=>$request->input('relation'), 'isRegistered'=>0
            ];

            family_information::create($patient_Data);
            return redirect('/');
        }
        //ADD IF STATEMENT FOR IF THE USER IS A PATIENT
        users::create($data);
        return redirect('/');

    }

    public function login(Request $request){
        $email = $request->email_input;
        $password = $request->password_input;

        $compare = users::where('email', '=', $email)->first();
        if($compare){
            if($email == $compare->email && $password == $compare->password){
                if($compare->isRegistered == 1){

                    $session_user = users::where('userID', '=', "$compare->userID")->join('roles', 'users.roleID', '=', 'roles.roleID')->first();
                    session([
                        'userID' =>$session_user->userID,
                        'roleName' => $session_user->roleName,
                        'accesslevel' => $session_user->accesslevel,
                        'firstName' => $session_user->firstName,
                        'lastName' => $session_user->lastName
                    ]);
                    // session()->flush();
                    //DONT UNCOMMENT THAT I'M BEGGING YOU
                    //This is important for the Logout Feature

                    if(session('roleName') == 'admin'){
                        return redirect('/');
                    }
                    elseif(session('roleName') == 'supervisor'){
                        return redirect('/');
                    }
                    elseif(session('roleName') == 'doctor'){
                        return redirect('/DoctorH');
                    }
                    elseif(session('roleName') == 'caregiver'){
                        return redirect('/CaregiverH');
                    }
                    elseif(session('roleName') == 'patient'){
                        return redirect('/');
                    }
                    elseif(session('roleName') == 'family'){
                        return redirect('/family');
                    }
                    return redirect('/');
                    return session('userID');
                }
                elseif($compare->isRegistered == 0){
                    $error = "Error:  User has not been confirmed yet.  Please try again Later";
                    return view('/login', ['data' => $error]);
                }
        }}
        $error = "Error: Email and Password do not match.";
        return view('/login', ['data' => $error]);
        
        
    }

    public function roster(Request $request){
        $date = $request->date;

        $data = rosters::where('date', '=', $date)->first();
        if($data){
            $doctor = users::where('userID', '=', $data['userID_Doctor'])->first();
            $doctorName = $doctor['firstName'] . " " . $doctor['lastName'];
            
            $cg_1 = users::where('userID', '=', $data['userID_CG1'])->first();
            $cg_1Name = $cg_1['firstName'] . " " . $cg_1['lastName'];
    
            $cg_2 = users::where('userID', '=', $data['userID_CG2'])->first();
            $cg_2Name = $cg_2['firstName'] . " " . $cg_2['lastName'];
    
            $cg_3 = users::where('userID', '=', $data['userID_CG3'])->first();
            $cg_3Name = $cg_3['firstName'] . " " . $cg_3['lastName'];
    
            $cg_4 = users::where('userID', '=', $data['userID_CG4'])->first();
            $cg_4Name = $cg_4['firstName'] . " " . $cg_4['lastName'];
    
            $roster = [
                'doctor' => $doctorName,
                'cg_1' => $cg_1Name,
                'cg_2' => $cg_2Name,
                'cg_3' => $cg_3Name,
                'cg_4' => $cg_4Name
            ];
            
            return view('rosters_list', ['data' => $roster]);
            // return redirect()->route('roster')->with(['data' => $roster]);    
        }
        return redirect('/roster');
    }


}

