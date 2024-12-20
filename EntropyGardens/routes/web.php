<?php
use App\Http\Controllers\Entropy_View_Controller;
use App\Http\Controllers\CaregiverHomeControlller;
use App\Http\Controllers\DoctorHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NewRosterApi;
use App\Http\Controllers\AdminReport;


Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');

Route::get('/doctorH', [DoctorHomeController::class, 'index'])->name('DoctorH.index');
Route::get('/caregiverH', [CaregiverHomeControlller::class, 'index'])->name('CaregiverH.index');

Route::get('/hi', function () {
    return 'Hi';
});
Route::get('/DoctorH', [DoctorHomeController::class, 'index'])->name('DoctorH.index');
Route::get('/DoctorH/search', [DoctorHomeController::class, 'search'])->name('doctor.search');
Route::get('/DoctorH/til-date', [DoctorHomeController::class, 'searchTilDate'])->name('doctor.searchTilDate');

Route::get('/PatientsList', [EmployeeController::class, 'viewPatients']);
Route::get('/PatientsList/search-by-id', [EmployeeController::class, 'searchPatByID'])->name('patients.searchPatByID');
Route::get('/PatientsList/search-by-Lname', [EmployeeController::class, 'searchPatByLastName'])->name('patients.searchPatByLastName');
Route::get('/PatientsList/search-by-e_contact', [EmployeeController::class, 'searchPatByCon'])->name('patients.searchPatByCon');
Route::get('/PatientsList/search-by-date', [EmployeeController::class, 'searchPatByDate'])->name('patients.searchPatByDate');

Route::get('/CaregiverH', [CaregiverHomeControlller::class, 'index'])->name('CaregiverH.index');

Route::get('/family', [Entropy_View_Controller::class, 'familyHome']);
Route::post('/family', [Entropy_View_Controller::class, 'familyPatientSearch']);
Route::post('/family/search', [Entropy_View_Controller::class, 'familyRosterSearch']);

// Route::get('/', function () {
//     return view('welcome');
// });

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
Route::get('/roster', [Entropy_View_Controller::class, 'roster_list'])->name('roster');
Route::post('/roster', [Entropy_View_Controller::class, 'roster_show']);

Route::get('/payment', [Entropy_View_Controller::class, 'payment']);

Route::get('/roles', [Entropy_View_Controller::class, 'roles']);

//Routes to Control the Patient Home Page
Route::get('/patient', [Entropy_View_Controller::class, 'patientHome']);
Route::post('/patient', [Entropy_View_Controller::class, 'patientHome']);

//Additional Information of Patient Search option
Route::get('/additional/search/id', [Entropy_View_Controller::class, 'additionalSearchID']);

//Patient of Doctor Controllers
Route::get('/doctor/patients', [Entropy_View_Controller::class, 'doctorPatients']);
Route::post('/doctor/patients/search', [Entropy_View_Controller::class, 'doctorPatientSearch']);

//Doctor's Appointments page
Route::get('/appointments', [Entropy_View_Controller::class, 'appointments']);
Route::get('/appointments/search', [Entropy_View_Controller::class, 'appointments']);

//Admin Report Route
Route::get('/report', [Entropy_View_Controller::class, 'adminReport']);
Route::get('/report/search', [Entropy_View_Controller::class, 'adminReport']);

//Caregiver Home Route
Route::get('/caregiver', [Entropy_View_Controller::class, 'caregiverHome']);
Route::post('/caregiver', [Entropy_View_Controller::class, 'caregiverHome']);

