<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('pages.students.index');
    }

    public function show($id)
    {
        return view('pages.students.show', [
            'student' => $id
        ]);
    }
    public function create()
    {
        return view('pages.student.create');
    }
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'school_id' => 'required|exists:schools,id',
        ]);

        // Logic to create a new student
        $student = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'birth_date' => $validated['date_of_birth'],
        ]);

        // Assuming you have a UserSchool model to associate the student with a school
        UserSchool::create([
            'user_id' => $student->id,
            'school_id' => $request->input('school_id'),
            'role' => 'student',
        ]);

        // Logic to store student data
        // $student = new User();
        // $student->name = $request->input('name');
        // $student->email = $request->input('email');
        // $student->password = bcrypt($request->input('password'));
        // $student->role = 'student';
        // $student->save();
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete student
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
    public function edit($id)
    {
        return view('pages.student.edit', [
            'student' => $id
        ]);
    }
    public function update(Request $request, $id)
    {
        // Logic to update student data
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }
}
