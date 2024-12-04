<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\outstanding_balances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Payment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment')->with([
            "outstanding_balances" => outstanding_balances::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table("outstanding_balances")->insert([
            "userID" => $request->userID,
            "payTab" => $request->payTab
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return outstanding_balances::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outstanding_balances = outstanding_balances::findOrFail($id);
        $outstanding_balances->update($request->validate([
            "ID" => ["required", "unique:outstanding_balances,userID"],
            "Due" => ["required", "outstanding_balances,payTab"]
        ]));
        return $outstanding_balances;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
