<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;



class Entropy_API_Controller extends Controller
{
    public $timestamps=false;
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
        //
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

    public function register(Request $request){
        $data = $request->all();
        $insert_email = $request->email;
        $compare = users::where('email', '=', "$insert_email")->firstOrFail();
        if($compare == true){
            return view('/register', ['data' => true]);

        }
        else{
            users::create($data);
            return redirect('/');
        }
    }
}
