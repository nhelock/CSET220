<?php

use App\Http\Controllers\Entropy_API_Controller;
use Illuminate\Support\Facades\Route;


Route::resource('/routes', Entropy_API_Controller::class);

Route::post('/register', [Entropy_API_Controller::class, 'register']);
