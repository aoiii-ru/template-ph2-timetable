<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;

Route::get('/timetable', 
    [TimetableController::class, 'index']
);
