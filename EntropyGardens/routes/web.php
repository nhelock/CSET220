<?php

use App\Http\Controllers\Entropy_View_Controller;
use App\Http\Controllers\CaregiverHomeControlller;
use App\Http\Controllers\DoctorHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');


Route::get('/hi', function () {
    return 'Hi';
});
Route::get('/DoctorH', [DoctorHomeController::class, 'index'])->name('DoctorH.index');
Route::get('/CaregiverH', [CaregiverHomeControlller::class, 'index'])->name('CaregiverH.index');

Route::get('/family', [Entropy_View_Controller::class, 'familyHome']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Entropy_View_Controller::class, 'displayHome']);

Route::get('/test', [Entropy_View_Controller::class, 'test']);

Route::get('/register', [Entropy_View_Controller::class, 'register']);
