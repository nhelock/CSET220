<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;

class Entropy_View_Controller extends Controller
{
    public function displayHome(){
        return view('welcome');
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
}
