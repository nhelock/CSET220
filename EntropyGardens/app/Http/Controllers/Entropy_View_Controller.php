<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('register');
    }
}
