<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Tutor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $lecture = Lecture::all();
        return view('pages.tutor.lecture.index', compact('lecture'));
    }

    public function create()
    {
        return view('pages.tutor.lecture.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_name' => 'required',
            'book_name' => 'required',
            'subject' => 'required',
            'room_number' => 'required',
        ]);

        Lecture::create($validatedData);
        return redirect()->route('tutor.lecture.index')->with('success', 'Course created successfully.');
    }

    public function edit(Tutor $tutor)
    {
        return view('pages.tutor.lecture.edit', compact('tutor'));
    }

    public function update(Request $request, Tutor $tutor)
    {
        $validatedData = $request->validate([
            'teacher_name' => 'required',
            'book_name' => 'required',
            'subject' => 'required',
            'room_number' => 'required',
        ]);

        $tutor->update($validatedData);
        return redirect()->route('tutor.lecture.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Tutor $tutor)
    {
        $tutor->delete();
        return redirect()->route('tutor.lecture.index')->with('success', 'Course deleted successfully.');
    }
}
