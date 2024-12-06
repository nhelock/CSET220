<?php

namespace App\Http\Controllers;

use App\Models\rosters;
use App\Models\users;
use Illuminate\Http\Request;

class NewRosterApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newRoster = rosters::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'date' => 'required|date',
        'userID_Doctor' => 'required|exists:users,userID',
        'userID_CG1' => 'required|exists:users,userID',
        'userID_CG2' => 'required|exists:users,userID',
        'userID_CG3' => 'required|exists:users,userID',
        'userID_CG4' => 'required|exists:users,userID',
    ]);


    $newRoster = rosters::create($validatedData);

    return redirect()->route('newRoster')->with('success', 'Roster created successfully.');
    }

    public function newRoster()
    {
        $supervisors = Users::where('roleID', '2')->get();
        $doctors = Users::where('roleID', '3')->get();
        $caregivers = Users::where('roleID', '4')->get();

        
        return view('newRoster', compact('supervisors', 'doctors', 'caregivers'));
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
}
