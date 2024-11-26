<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\roles;

class RoleTransfer extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return roles::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "New" => ["required", "max:20"],
            "Access" => ["required", "unique"],
        ]);
        roles::create([
            "roleName" => $request->New,
            "accessLevel" => $request->Access,

        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return roles::findOrFail($id);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = roles::findOrFail($id);
        $roles ->update($request->validate([

            "New" => ["required", 'max:20', "unique:roles,roleName"],
            "Access" => ["required", "unique:roles, accessLevel"]
        ]));
        return $roles;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
