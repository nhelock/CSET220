<?php

use App\Http\Controllers\Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;
use App\Http\Controllers\RoleTransfer;

Route::resource('/role', RoleTransfer::class);

Route::resource('/payment', Payment::class);
