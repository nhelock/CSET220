<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\outstanding_balances;
// use App\Models\users;
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
        //users id call
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outstanding_balances = outstanding_balances::findOrFail($id);
        // $outstanding_balances->update($request->validate([
        //     "Tab" => ["required", "outstanding_balances,payTab"]
        // ]));
        return $outstanding_balances;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function alterPayment(Request $request)
    {
        // return "akter";
        $balanceID = $request->input("balanceID");
        $user = outstanding_balances::where("balanceID", $balanceID)->first();
        
        // return $user;
        // if ($user) {
        //     $amountDue = $user->payTab;
        //     $inputtedAmount = $request->input('New');
        //     $newBalance = $amountDue - $inputtedAmount;
        //     $user->payTab = $newBalance;
        //     $user->save();
        // } else {
        //     // should probably handle cases where the user is not found/should maybe have an error pop up

        // }

        // TODO validate $user

        DB::table("outstanding_balances")->where("balanceID", $balanceID)->update(["payTab" => $request->New]);

        // return outstanding_balances::create([
        //     "userID" => $request->userID,
        //     "payTab" => 10
        // ]);

        

        // $user->update([
        //     // "payTab" => ($user->payTab - $request->New)
        // ]);

        return $user;
    }
}
