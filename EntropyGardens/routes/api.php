<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;
use App\Http\Controllers\RoleTransfer;

Route::resource('role', RoleTransfer::class);