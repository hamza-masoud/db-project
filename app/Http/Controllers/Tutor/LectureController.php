<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Tutor;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with('course')->withCount('students')->get();
        return view('pages.tutor.lecture.index', compact('lectures'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('pages.tutor.lecture.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200|string',
            'description' => 'required|string',
            'course' => 'required|exists:courses,id',
            'room_number' => 'required|string|max:200',
        ]);

        $lecture = Lecture::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'course_id' => $request->input('course'),
            'room_number' => $request->input('room_number'),
        ]);

        return redirect()->route('tutor.lecture.show', $lecture)->with('success', 'Course created successfully.');
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


    public function show($id)
    {
        $lecture = Lecture::findOrFail($id)->load('course.students', 'students');
        $lecture_student = $lecture->students;
        $students = $lecture->course->students->reject(function ($student) use ($lecture_student) {
            return $lecture_student->contains('id', $student['id']);
        });
        return view('pages.tutor.lecture.show', compact('lecture', 'students'));
    }


}
