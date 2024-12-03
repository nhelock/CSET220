<?php

use App\Http\Controllers\NewRosterView;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function(){
    Route::get('/view', [NewRosterView::class, 'rosterView']);
});





