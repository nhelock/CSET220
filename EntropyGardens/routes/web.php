<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/role', [PageController::class, 'Roles']);

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/patient_of_doctor', function () {
//     return view('patient_of_doctor');
// });

// Route::get('/patients_home', function () {
//     return view('patients_home');
// });

// Route::get('/payment', function () {
//     return view('payment');
// });

?>