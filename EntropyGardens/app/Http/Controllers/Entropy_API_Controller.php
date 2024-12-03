<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\family_information;
use App\Models\roles;
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
                $session_user = users::where('userID', '=', "$compare->userID")->join('roles', 'users.roleID', '=', 'roles.roleID')->first();
                session([
                    'userID' =>$session_user->userID,
                    'roleName' => $session_user->roleName,
                    'accessLevel' => $session_user->accessLevel,
                    'firstName' => $session_user->firstName,
                    'lastName' => $session_user->lastName
                ]);
                // session()->flush();
                //This is important for the Logout Feature
                return redirect('/');
                return session('userID');
            }
        }
        return "Not Logged In";
        
        
    }


}

