<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;

class Login extends Controller
{
    public function index(){
        return users::all();
    }

    public function store(Request $request){
        $request->validate([
            "email" => ['required'],
            "password" => ['required']
        ]);
        return users::create($request->all);
    }

    public function verification(){
        
    }
}
