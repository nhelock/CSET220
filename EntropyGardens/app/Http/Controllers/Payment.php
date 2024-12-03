<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\outstanding_balances;
use Illuminate\Http\Request;

class Payment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        $outstanding_balances->validate([
            "ID" => ["required", "unique:outstanding_balances,userID"],
            "Due" => ["required", "unique:outstanding_balances,payTab"]
        ]);
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
