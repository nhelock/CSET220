<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{

    public function login(Request $request){
        $request->validate([
            "email" => ['email'],
            "password" => ['required']
        ]);
    }

    function storeInfo(Request $_store){
        if ($_POST['email_input'] || $_POST['password_input']);
    
        return 
    }
}
