<?php

use App\Http\Controllers\CaregiverHomeControlller;
use App\Http\Controllers\DoctorHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employee.search');
Route::post('/employees/update-salary', [EmployeeController::class, 'updateSalary'])->name('employee.updateSalary');
Route::get('/hi', function () {
    return 'Hi';
});
Route::get('/DoctorH', [DoctorHomeController::class, 'index'])->name('DoctorH.index');
Route::get('/CaregiverH', [CaregiverHomeControlller::class, 'index'])->name('CaregiverH.index');