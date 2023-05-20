<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TutorsController extends Controller
{
    /**
     * Display a listing of the tutors.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // Retrieve all tutors from the database
        $tutors = Tutor::all();

        // Pass the tutors data to the view
        return view('pages.admin.tutors.index', compact('tutors'));
    }

    /**
     * Show the form for creating a new tutor.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        // Show the create tutor form
        return view('pages.admin.tutors.create');
    }

    /**
     * Store a newly created tutor in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tutors',
            'phone' => 'required',
        ]);

        // Create a new tutor instance
        $tutor = new Tutor();
        $tutor->name = $request->input('name');
        $tutor->email = $request->input('email');
        $tutor->phone = $request->input('phone');

        // Save the tutor to the database
        $tutor->save();

        // Redirect to the tutors index page with a success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor created successfully.');
    }

    /**
     * Show the form for editing the specified tutor.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        // Find the tutor by ID
        $tutor = Tutor::find($id);

        // Show the edit tutor form
        return view('pages.admin.tutors.edit', compact('tutor'));
    }

    /**
     * Update the specified tutor in the database.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tutors,email,' . $id,
            'phone' => 'required',
        ]);

        // Find the tutor by ID
        $tutor = Tutor::find($id);
        $tutor->name = $request->input('name');
        $tutor->email = $request->input('email');
        $tutor->phone = $request->input('phone');

        // Save the updated tutor to the database
        $tutor->save();

        // Redirect to the tutors index page with a success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor updated successfully.');
    }

    /**
     * Remove the specified tutor from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the tutor by ID and delete it
        Tutor::destroy($id);

        // Redirect to the tutors index page with a success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor deleted successfully.');
    }
}
