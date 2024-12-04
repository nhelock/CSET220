<?php
use App\Http\Controllers\Entropy_View_Controller;
use App\Http\Controllers\CaregiverHomeControlller;
use App\Http\Controllers\DoctorHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NewRosterApi;

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');

Route::get('/doctorH', [DoctorHomeController::class, 'index'])->name('DoctorH.index');
Route::get('/caregiverH', [CaregiverHomeControlller::class, 'index'])->name('CaregiverH.index');


Route::get('/family', [Entropy_View_Controller::class, 'familyHome']);
Route::get('/', [Entropy_View_Controller::class, 'displayHome'])->middleware('web');
Route::get('/test', [Entropy_View_Controller::class, 'test']);
Route::get('/register', [Entropy_View_Controller::class, 'register']);
Route::get('/approval', [Entropy_View_Controller::class, 'registrationApproval']);
Route::get('/login', [Entropy_View_Controller::class, 'loginPage']);
Route::get('/logout', [Entropy_View_Controller::class, 'logout']);


Route::get('/newRoster/create', [NewRosterApi::class, 'create']);
Route::post('/newRoster', [NewRosterApi::class, 'store'])->name('rosters.store');
Route::get('/newRoster', [NewRosterApi::class, 'newRoster'])->name('newRoster');

Route::get('/additional', [Entropy_View_Controller::class, 'additionalInfo']);