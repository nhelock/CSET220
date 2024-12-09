<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\users;
use App\Models\itineraries;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\missed_activities;

class CaregiverHomeControlller extends Controller
    {
        public function submitChecklist(Request $request)
            {
                $date = Carbon::now()->toDateString();

            }

    }
