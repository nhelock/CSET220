<?php

use App\Http\Controllers\Entropy_API_Controller;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::resource('/routes', Entropy_API_Controller::class);

//Registers a User
Route::post('/registerUser', [Entropy_API_Controller::class, 'register']);

//Updates the Salary of an Employee in the Employee Page.
Route::post('/employees/update-salary', [EmployeeController::class, 'updateSalary']);