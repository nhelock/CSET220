<?php

namespace App\Http\Controllers;
use App\Models\rosters;

use Illuminate\Http\Request;

class NewRosterView extends Controller
{
    function rosterView() {
        return view('newRoster');
    }
}
