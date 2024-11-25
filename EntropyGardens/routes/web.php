<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employee.search');
Route::post('/employees/update-salary', [EmployeeController::class, 'updateSalary'])->name('employee.updateSalary');
Route::get('/hi', function () {
    return 'Hi';
});
