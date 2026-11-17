<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TimetableEntryController extends Controller
{
    public function index()
    {
        $entries = TimetableEntry::orderBy('day')
            ->orderBy('period')
            ->get();

        return view('entries.index', [
            'entries' => $entries
        ]);
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => [
                'required',
                'integer',
                'between:1,5',
                Rule::unique('timetable_entries', 'day')
                    ->where('period', $request->input('period')),
            ],
            'period' => ['required', 'integer', 'between:1,6'],
            'title' => ['required', 'string', 'max:255'],
            'room' => ['nullable', 'string', 'max:255'],
        ], [
            'day.unique' => 'この曜日と時限には、すでに授業が登録されています。',
        ]);

        TimetableEntry::create($validated);

        return redirect('/entries');
    }
}