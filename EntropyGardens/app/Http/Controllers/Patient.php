<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Patient extends Controller
{
    function patientsHome(){
        DB::table('itineraries');
    }
}
