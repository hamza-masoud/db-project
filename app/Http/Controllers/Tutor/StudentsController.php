<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the tutors.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $students = Student::all();
        return view('pages.tutor.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new tutor.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.tutor.student.create');
    }

    /**
     * Store a newly created tutor in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:200',
            'phone' => 'required|unique:phones,number',
            'id' => 'required|unique:students,id',
        ]);

        $student = new Student();
        $student->full_name = $request->input('full_name');
        $student->id = $request->input('id');
        $student->gender = $request->input('phone');
        $student->save();
        $student->courses()->sync($request->input('course'));

        return redirect()->route('tutor.student.index')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified tutor.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id)->load('courses');
        return view('pages.tutor.student.edit', compact('student'));
    }

    /**
     * Update the specified tutor in the database.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:200',
            'course' => 'required|array|min:1',
            'course.*' => 'required|integer|exists:courses,id',
        ]);

        $student = Student::findOrFail($id);
        $student->full_name = $request->input('full_name');
        $student->save();

        $student->courses()->sync($request->input('course'));

        return redirect()->route('tutor.student.index')->with('success', 'Tutor updated successfully.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('tutor.student.index')->with('success', 'Tutor deleted successfully.');
    }
}
