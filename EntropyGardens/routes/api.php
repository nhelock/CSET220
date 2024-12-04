<?php

use App\Http\Controllers\Entropy_API_Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CaregiverHomeControlller;
use Illuminate\Support\Facades\Route;


Route::resource('/routes', Entropy_API_Controller::class);

//Registers a User
Route::post('/registerUser', [Entropy_API_Controller::class, 'register']);

//Updates the Salary of an Employee in the Employee Page.
Route::post('/employees/update-salary', [EmployeeController::class, 'updateSalary'])->middleware('web');

//Finds a Specific Employee
Route::get('/employees/search/id', [EmployeeController::class, 'search']);
Route::get('/employees/search/name', [EmployeeController::class, 'search']);

//These need a NEW FUNCTION since they require the salary table to be joined.
Route::get('/employees/search/salary', [EmployeeController::class, 'searchJoin']);
Route::get('/employees/search/role', [EmployeeController::class, 'searchJoin']);

//I want you to know this didn't work for 20 minutes because the form said "approval" and the route said "approve"
//Kill me
Route::POST('/approval', [Entropy_API_Controller::class, 'approve']);

Route::post('/login', [Entropy_API_Controller::class, 'login'])->middleware('web');

Route::post('/roster', [Entropy_API_Controller::class, 'roster']);