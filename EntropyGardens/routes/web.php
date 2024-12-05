<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/role', [PageController::class, 'Roles']);

// Route::post('/role', [PageController::class, 'RolesTransfer']);

Route::get('/login', [PageController::class, 'Login'])->name("login");

Route::get('/patientofdoctor', [PageController::class, 'PatientofDoctor']);

// Route::get('/payment', [PageController::class, 'Payment']);

// Route::get('/patients_home', function () {
//     return view('patients_home');
// });

// Route::get('/payment', function () {
//     return view('payment');
// });

?>