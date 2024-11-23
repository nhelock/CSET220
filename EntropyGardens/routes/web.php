<?php

use App\Http\Controllers\Entropy_View_Controller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Entropy_View_Controller::class, 'displayHome']);

Route::get('/test', [Entropy_View_Controller::class, 'test']);

Route::get('/register', [Entropy_View_Controller::class, 'register']);
