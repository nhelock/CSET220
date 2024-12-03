<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\users;

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

    public function familyHome(){
        return view('familyHome');
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
    

    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
