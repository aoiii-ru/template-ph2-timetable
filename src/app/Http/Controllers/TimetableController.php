<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        $set1 = DB::select('
            SELECT PERIOD, NAME, teacher, room
            FROM courses
            WHERE DAY=1
            ORDER BY PERIOD ASC
        ');

        $set2 = DB::select('
            SELECT NAME, credits
            FROM courses
            WHERE required=TRUE
            ORDER BY code ASC
        ');
        
        return view('timetable', [
            'set1' => $set1,
            'set2' => $set2
        ]);
    }
}
