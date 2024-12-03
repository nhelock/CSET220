<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{

    public function login(Request $request){
        $request->validate([
            "email" => ['required'],
            "password" => ['required']
        ]);
        if($request){

        }
    }
}
